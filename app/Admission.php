<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    //
    protected $fillable = ['ptient_id', 'doctor_id', 'nurse_id', 'ward_name', 'bed_number', 'discharge_status'];

    
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
        return $this->belongsTo(Nurse::class, 'nurse_id');
    }
    
    
    
}
