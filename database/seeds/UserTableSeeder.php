<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = new \App\User([
            'name' => 'systemadmin',
            'phone' => '08089208989',
            'user_roles_id' => '1',
            'email' => 'systemadmin@gmail.com',
            'password' => Hash::make('3b3b3b3b')
        ]);
        $user->save();
    }
}
