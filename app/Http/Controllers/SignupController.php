<?php

namespace App\Http\Controllers;
use App\User;
use Hash;
use Illuminate\Http\Request;

class SignupController extends Controller
{
    //

    public function index(){
        return view('auth.signup');
    }

    public function create_account(Request $request){
        //dd($request->all());
        
        $this->validate($request, [
            'name' => ['required'],
            'email' => ['required'],
            'phone' => ["required"],
            'password' => ['required'],
        ]);
        $data = $request->all();
       // dd($data['phone']);
        $user_account =  new User([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);
        $user_account->save();
        return redirect()->route('auth.signin');    
    }
}
