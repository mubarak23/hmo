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
            return $this->hasMany(Appointment::class, 'doctor_id', 'user_id');
    }

    
    
    public function admissions()
    {
        return $this->hasMany(Admission::class, 'admission_id', 'id');
    }

    
    

    
    public function tests()
    {
        return $this->hasMany(Test::class, 'doctor_id');
    }

    
    public function consultations()
    {
        return $this->hasMany(Consultation::class, 'doctor_id', 'id');
    }
    
    
    public function priscription()
    {
        return $this->hasMany(Priscription::class, 'doctor_id', 'id');
    }
    
    
}
