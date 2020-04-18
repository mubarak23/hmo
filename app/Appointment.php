<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //

    protected $fillable = [
        'patient_id', 'doctor_id', 'appt_time', 'remark',
    ];
    public function doctor(){
        return $this->belongTo('App\Appoitment', 'doctor_id');
    }

    public function patient(){
        return $this->belongTo('App\Appoitment', 'patient_id');
    }
}
