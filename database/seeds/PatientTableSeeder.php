<?php

use Illuminate\Database\Seeder;

class PatientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $patient = new \App\Patient([
            'first_name' => 'Lucky',
            'last_name' => 'Rich',
            'gender' => 'male',
            'blood_group' => '0+',
            'date_birth' => '10-09-2001',
            'phone_number'=> '09089785634',
            'email' => 'luckyrich@gmail.com',
            'address' => 'Dan Marna Street U/rimi Kd',
            'status' =>  0
        ]);
        $doctor->save();
    }
}
