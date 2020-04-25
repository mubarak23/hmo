<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //

    protected $fillable = [
        'patient_id', 'doctor_id', 'appt_time', 'remark',
    ];
    public function doctor(){
        return $this->belongsTo(Doctor::class, 'doctor_id', 'user_id');
    }
    
    
    public function user()
    {
        return $this->belongsTo('App\User', 'foreign_key', 'other_key');
    }
    

    public function patient(){
        return $this->belongsTo(Patient::class, 'patient_id');
    }
}
