<?php

use Illuminate\Database\Seeder;

class UserRoleTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user_role = new \App\User_role();
        $user_role->name = 'systemadmin';
        $user_role->save();
        
        $user_role = new \App\User_role();
        $user_role->name = 'doctor';
        $user_role->save();
        
        $user_role = new \App\User_role();
        $user_role->name = 'nurse';
        $user_role->save();
        
        $user_role = new \App\User_role();
        $user_role->name = 'pharmacist';
        $user_role->save();

        $user_role = new \App\User_role();
        $user_role->name = 'labaratory';
        $user_role->save();

        $user_role = new \App\User_role();
        $user_role->name = 'receptionist';
        $user_role->save();

        $user_role = new \App\User_role();
        $user_role->name = 'patient';
        $user_role->save();
    }
}
