<?php

use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $service = new \App\Services([
            'name' => 'Hematology',
        ]);
        $service->save();
        $service = new \App\Services([
            'name' => 'BiaChemistry',
        ]);
        $service->save();
        $service = new \App\Services([
            'name' => 'Cytology',
        ]);
        $service->save();

        $service = new \App\Services([
            'name' => 'Microbiology',
        ]);
        $service->save();
        $service = new \App\Services([
            'name' => 'Radiograpy',
        ]);
        $service->save();
    }
}
