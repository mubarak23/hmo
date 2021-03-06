<?php

namespace App\Http\Controllers;
use Auth;
use App\Admission;
use App\Consultation;
use App\Doctor;
use App\Drug;
use App\Patient;
use App\Priscription;
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
        $user_data = User::where('id', $user_id)->select('id', 'name')->first();
        $doctor = Doctor::where('user_id', $user_id)->first();
        if(!$doctor){
            //return dd('You will need to update your profile before login');
            //return $user_data;
            return view('dashboard.doctor.update', ['user_data' => $user_data]);
        }

        $appointments = Appointment::where('doctor_id', $doctor->user_id)
        ->with('doctor')->with('patient')->get();
        //return $doctor->user_id;
        return view('dashboard.main_doctor', ['appointments' => $appointments]);
    }

    public function doctor_update(){
        //return request();
        Doctor::create(request()->validate([
                'name' => 'required',
                'consultation_hours' => 'required',
                'office_no' => 'required',
                'specialist' => 'required',
                'user_id' => 'required'            
        ]));
        return redirect()->route('doctor.index');

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
        //dd(Auth()->user()->id);
        $patient_activities = Appointment::where('patient_id', $patient_id)->where('doctor_id', Auth()->user()->id)->with('doctor')
                                ->get();
         $doctor_activities = Patient::where('id', $patient_id)
         ->with('consultations')->with('priscriptions')->first();                       
         $drugs =Drug::all();                    
        //collect data i.e patient details, appointment, priscription and consultation
       
        return view('dashboard.patient.activity',
         ['patient_activities' => $patient_activities, 
         'doctor_activities' => $doctor_activities,
         'drugs' => $drugs]);
    }


    public function add_consutation(){
        //dd($request->all());
        Consultation::create(request()->validate([
            'patient_id' => 'required',
            'doctor_id' => 'required',
            'symptoms' => 'required',
            'next_appt_date' => 'required',
            'test_status'  => 'required'
        ]));
        return redirect()->back();

    }

    public function add_priscription(){ 
            Priscription::create(request()->validate([
                'patient_id' => 'required',
                'doctor_id' => 'required',
                'symptoms' => 'required',
                'drugs' => 'required',
                'period'  => 'required',
                'status' => 'required'
            ]));
            return redirect()->back();
    }

    //list of priscription for a particular doctor
    public function doctor_priscription($doctor_id){
        $doctor_priscriptions = Priscription::where('doctor_id', $doctor_id)->with('patient')->get();
         //return $doctor_priscriptions;   
        return view('dashboard.doctor.priscription',
         ['doctor_priscriptions' => $doctor_priscriptions]);
    }




    public function admission_lists(){
        $admission_lists = Admission::take(50)->latest()->with('patient')
        ->with('nurse')->with('doctor')->get();
        //return $admission_lists;
        return view('dashboard.doctor.admission_list', ['admission_lists' => $admission_lists ]);
    }

    
    

    
 

    

    
}
