<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
class AppointmentController extends Controller
{
    //
    public function index(){

    }

    public function create(Request $request){
        $this->validate($request, [
            'appt_time' => 'required',
            'remark' => 'required'
        ]);
        $data = $request->all();
        $appointment = new Appointment([
            'patient_id' => $data['patient_id'],
            'doctor_id' => $data['doctor_id'],
            'appt_time' => $data['appt_time'],
            'remark' => $data['remark']
        ]);
        $appointment->save();
        return redirect()->route('nurse.index');
    }

    
}
