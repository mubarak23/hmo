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
            return $this->hasMany(Appointment::class, 'doctor_id');
    }

    
    public function test()
    {
        return $this->hasMany(Test::class, 'doctor_id');
    }
    
}
