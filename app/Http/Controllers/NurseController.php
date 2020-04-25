<?php

namespace App\Http\Controllers;

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
        dd(request());
        Nurse::create(request()->validate([
            'user_id' => 'required',
            'name' => 'required',
            'field_study' =>'required',
            'off_days' => 'required'
        ]));
        return redirect()->back();
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
