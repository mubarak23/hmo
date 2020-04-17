<?php

namespace App\Http\Controllers;

use App\SystemAdmin;
use App\User;
use App\User_role;
use Illuminate\Http\Request;

class SystemAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user_data = User::take(5)->latest()->get();
        $user_role = User_role::all();
        return view('dashboard.main', ['user_data' => $user_data, 'user_role'=> $user_role]);
    }

    public function assing_user_role(Request $request){
            //dd($request->all());
            $data = $request->all();
            //find the user
            $assign_role = User::find($data['user_id']);
            //dd($assign_role);
            $assign_role->user_roles_id = $data['user_role_id'];
            $assign_role->save();
            //return $assign_role;
            return redirect()->route('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SystemAdmin  $systemAdmin
     * @return \Illuminate\Http\Response
     */
    public function show(SystemAdmin $systemAdmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SystemAdmin  $systemAdmin
     * @return \Illuminate\Http\Response
     */
    public function edit(SystemAdmin $systemAdmin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SystemAdmin  $systemAdmin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SystemAdmin $systemAdmin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SystemAdmin  $systemAdmin
     * @return \Illuminate\Http\Response
     */
    public function destroy(SystemAdmin $systemAdmin)
    {
        //
    }
}
