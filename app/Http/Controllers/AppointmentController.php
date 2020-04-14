<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Appointment;
class AppointmentController extends Controller
{
    //
    public function index(){

    }

    public function create(Request $request){
        $this->validate($request, [
            'doctor_id' => 'required',
            'patient_id' => 'required',
            'appt_time' => 'required',
            'remark' => 'required'
        ]);
        $appointment = Appointment::create($request->all());
        return redirect()->route('appointment.index');
    }
    
    
}
