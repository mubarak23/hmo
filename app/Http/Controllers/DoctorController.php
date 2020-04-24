<?php

namespace App\Http\Controllers;
use Auth;
use App\Doctor;
use App\Patient;
use App\Disease;
use App\User;
use APP\Test;
use App\Appointment;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //dd(Auth::user()->id);
        $user_id =  Auth::user()->id;
        $doctor = Doctor::where('user_id', $user_id)->first();
        $appointments = Appointment::where('doctor_id', $doctor->user_id)
        ->with('doctor')->with('patient')->get();
        return view('dashboard.main_doctor', ['appointments' => $appointments]);
    }


    public function updateprofile(Request $request){
            //dd($request->all());
            $data = $request->all();
            //get user data
            $user_data = User::find($data['user_id']);
            $update_profile = new Doctor([
                'user_id' => $data['user_id'],
                'name'  => $user_data->name,
                'specialist' => $data['specialist'],
                'office_no' => $data['office_no'],
                'consultation_hours' => $data['consultation_hours']
            ]);
            $update_profile->save();
            return redirect()->route('doctor.index')->with('success', 'Patient Successfully Registered');
    }

   
    public function viewalldisease()
    {
          $disease_data = Disease::paginate(10);
          return view('dashboard.doctor.disease', ['diseases' => $disease_data]); 
    }


    public function RequestTest(Request $request){
        $this->validate($request->all(), [
            'patient_id' => 'required',
            'doctor_id' => 'required',
            'type' => 'required'
        ]);

        $data = $request->all();
        $request_test = new Test([
            'patient_id' => $data['patient_id'],
            'doctor_id' => $data['doctor_id'],
            'type'  => $data['type'],
            'lab_service' => $data['lab_service'],
            'status' => $data['status'],
            'request' => $data['request'],
            'result_url' => $data['result_url']
        ]);
        $request_test->save();
        return redirect()->back();
    }


    //patient file activity
    public function patient_activity($patient_id){
        //dd($patient_id);
        $patient_activities = Appointment::where('patient_id', $patient_id)->where('doctor_id', Auth()->user()->id)->with('doctor')
                                ->get();
         $doctor_activities = Patient::where('id', $patient_id)
         ->with('consultations')->with('priscriptions')->first();                       
                            //return $patient_activities;
                            //return $doctor_activities;
        //collect data i.e patient details, appointment, priscription and consultation

        return view('dashboard.patient.activity',
         ['patient_activities' => $patient_activities, 'doctor_activities' => $doctor_activities]);
    }

    

    
 

    

    
}
