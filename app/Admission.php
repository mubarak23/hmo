<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    //
    protected $fillable = ['patient_id', 'doctor_id', 'nurse_id', 'ward_name', 'ward_type', 'bed_number', 'discharge_status'];

    
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'user_id');
    }

    
    public function nurse()
    {
        return $this->belongsTo(Nurse::class, 'nurse_id', 'user_id');
    }
    
    
   
    
    
    
}
