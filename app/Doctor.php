<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    //
    protected $fillable = [
        'user_id', 'name', 'specialist', 'office_no', 'consultation_hours',
    ];

    public function appointment(){
            return $this->hasMany('App\Appointment', 'doctor_id');
    }
}
