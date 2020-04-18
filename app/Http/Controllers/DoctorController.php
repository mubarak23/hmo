<?php

namespace App\Http\Controllers;
use Auth;
use App\Doctor;
use App\Patient;
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
        //return $doctor;
        $appointments = Appointment::where('doctor_id', $doctor->user_id)->with('doctor')->with('patient')->get();
        //return $appointments;
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}
