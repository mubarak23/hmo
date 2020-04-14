<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    //

    public function appointment(){
            return $this->hasMany('App\Appointment', 'doctor_id');
    }
}
