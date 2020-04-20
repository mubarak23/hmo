<?php

namespace App\Http\Controllers;
use Auth;
use App\Doctor;
use App\Patient;
use App\Disease;
use App\User;
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

    

    
 

    

    
}
