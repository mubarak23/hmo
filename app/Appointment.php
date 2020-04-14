<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
    public function doctor(){
        return $this->belongTo('App\Appoitment', 'doctor_id');
    }

    public function patient(){
        return $this->belongTo('App\Appoitment', 'patient_id');
    }
}
