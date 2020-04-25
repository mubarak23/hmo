<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nurse extends Model
{
    //

    
    public function admissions()
    {
        return $this->hasMany(Admission::class, 'admission_id', 'id');
    }
    
}
