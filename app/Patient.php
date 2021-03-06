<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = ['first_name', 'last_name', 'middlename', 'gender', 
    'date_birth', 'gender', 'profile_pic', 'blood_group', 'email', 'phone_number', 'status', 'address'];
    //
    public function appointment(){
        return $this->hasMany(Appointment::class, 'patient_id');
        }

     
     public function test()
     {
         return $this->hasMany(Test::class, 'patient_id', 'id');
     }

     
     public function consultations()
     {
         return $this->hasMany(Consultation::class, 'patient_id', 'id');
     }

     
     public function admissions()
     {
         return $this->hasMany(Admission::class, 'admission_id', 'id');
     }
     

     
     public function priscriptions()
     {
         return $this->hasMany(Priscription::class, 'patient_id', 'id');
     }
     
     

     
        
}
