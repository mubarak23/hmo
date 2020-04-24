<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    //
    protected $fillable = [ 'patient_id', 'doctor_id', 'symptoms', 
                             'next_appt_date', 'test_status' ];
    
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
    
    
}
