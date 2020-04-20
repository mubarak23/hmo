<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    //
    protected $fillable = [
        'patient_id', 'doctor_id', 'type', 'lab_service', 'status', 'request' ,'result_url'
    ];

   
        public function patient()
        {
            return $this->belongsTo(Patient::class, 'patient_id');
        }

        public function doctor()
        {
            return $this->belongsTo(Doctor::class, 'doctor_id');
        }
        
    
}
