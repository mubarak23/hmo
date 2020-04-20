<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    //

   
        public function patient()
        {
            return $this->belongsTo(Patient::class, 'patient_id');
        }

        public function doctor()
        {
            return $this->belongsTo(Doctor::class, 'doctor_id');
        }
        
    
}
