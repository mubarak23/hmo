<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignupController extends Controller
{
    //

    public function index(){
        return view('auth.signup');
    }

    public function create_account(Request $request){
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => "required",
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user_account =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);
        $user_account->save();
        return redirect()->route('auth.signin');    
    }
}
