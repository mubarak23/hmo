<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Admission;
use App\Nurse;
use App\Patient;
use App\Doctor;
use Illuminate\Http\Request;

class NurseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // patient data
        $patient_data = Patient::take(5)->latest()->get();
        $doctors_data = Doctor::all();
        return view('dashboard.main_nurse', ['patient_data' => $patient_data, 'doctors' =>$doctors_data]);
    }
/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create(){
        return view('dashboard.nurse.register_patient');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //return $request->all();
        //dd($request->all());
        $this->validate($request, [
            "first_name" => "required",
            "last_name" => "required",
            "gender" => "required",
            "blood_group" => "required",
           //"profile_pic" =>'required|mimes:jpeg,png,jpg,bmp|max:2048',
            "date_birth" => "required",
            "phone_number" => "required",
            "email"     => "required",
            "address" => "required",
        ]);
        if($file = $request->file('profile_pic')){
            return $request->file('profile_pic');
            $name = time().time(). '.'.$file->getClientOriginalExtension();
            $target_path = public_path('/uploads');
            if($file->move($target_path, $name)){
                $data = $request->all();
                $data['profile_pic'] = $name;
                $create_patient = new Patient([
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'middlename' => $data['middle_name'],
                    'gender' => $data['gender'],
                    'profile_pic' => $data['profile_pic'],
                    'blodod_group' => $data['blood_group'],
                    'date_birth' => $data['date_birth'],
                    'phone_number' => $data['phone_number'],
                    'email' => $data['email'],
                    'address' => $data['address']
                ]);
                $create_patient->save();
                return redirect()->route('nurse.index')->with('success', 'Patient Successfully Registered');

            }
        }
        $data = $request->all();
        $create_patient = new Patient([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'middlename' => $data['middle_name'],
            'gender' => $data['gender'],
            'blood_group' => $data['blood_group'],
            'date_birth' => $data['date_birth'],
            'phone_number' => $data['phone_number'],
            'email' => $data['email'],
            'address' => $data['address']
        ]);
        $create_patient->save();
        return redirect()->route('nurse.index')->with('success', 'Patient Successfully Registered');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nurse  $nurse
     * @return \Illuminate\Http\Response
     */
    public function update_profile(){
        
        Nurse::create(request()->validate([
            'user_id' => 'required',
            'name' => 'required',
            'field_study' =>'required',
            'off_days' => 'required'
        ]));
        return redirect()->back();
    }


    public function patients_data(){
        $patients_data = Patient::paginate(10);
        return view('dashboard.nurse.patient_data', ['patient_data' => $patients_data]);
    }


    public function admit_patient(Request $request){
        
        $data = $request->all();
        $doctor = Appointment::where('patient_id', $data['patient_id'])
        ->select('doctor_id')->first();
        $data['doctor_id'] = $doctor->doctor_id;
        $data['discharge_status'] = '0';
        //return $data;
        $admit_to_ward = New Admission([
            'patient_id' => $data['patient_id'],
            'doctor_id' => $data['doctor_id'],
            'ward_name' => $data['ward_name'],
            'ward_type' => $data['ward_type'],
            'bed_number' => $data['bed_number'],
            'nurse_id' => $data['nurse_id'],
            'discharge_status' => 0
        ]);
        $admit_to_ward->save();
        return redirect()->back();
    }


    public function admission_lists(){
        $admission_lists = Admission::take(50)->latest()->with('patient')
        ->with('nurse')->with('doctor')->get();
        //return $admission_lists;
        return view('dashboard.nurse.admission_list', ['admission_lists' => $admission_lists ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nurse  $nurse
     * @return \Illuminate\Http\Response
     */
    public function edit(Nurse $nurse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nurse  $nurse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nurse $nurse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nurse  $nurse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nurse $nurse)
    {
        //
    }
}
