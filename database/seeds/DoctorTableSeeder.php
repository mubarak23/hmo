<?php

use Illuminate\Database\Seeder;

class DoctorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $doctor = new \App\Doctor([
            'name' => 'Lukman Idris',
            'specialist' => 'Ear and Brain',
            'office_no' => '5',
            'consultation_hours' => '4hrs',

        ]);
        $doctor->save();
    }
}
