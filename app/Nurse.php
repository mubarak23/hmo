<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nurse extends Model
{
    //
    protected $fillable = ['user_id', 'name', 'field_study', 'off_days'];
    
    public function admissions()
    {
        return $this->hasMany(Admission::class, 'admission_id', 'id');
    }
    
}
