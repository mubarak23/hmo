<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    public function appointment(){
        return $this->hasMany('App\Appointment', 'patient_id');
}
}
