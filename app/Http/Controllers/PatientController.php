<?php

namespace App\Http\Controllers;

use App\Patient;
use App\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index(){

    }

    public function create(Request $request){
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'blood_group' => 'required',
            'data' => 'required',
            'phone_number' => 'required',
            'address' => 'required'
        ]);
        $data = $request->all();
        $data['password'] = str_random(8);
        $register_patient = Patient::create($request->all());
        $user_data = [
            'name' => $data['first_name'] .'+'. $data['last_name'],
            'email' => $data['email'],
            'role_id' => 7,
            'phone' => $data['phone_number'],
            'password' =>  $data['password']
        ];
        
        return redirect()->route('patient.index');
    }


    
    public function patient_user_account($data){
        if(!empty($data['email'])){
            User::create($data);
        }
        $data['email'] = 'Admin@HMO.ng';
         return $resister_user = User::create($data);
        
    }
}
