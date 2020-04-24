<?php

use Illuminate\Database\Seeder;

class DrugsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $drug = new \App\Drug([
            'name' => 'vitiamin C',
            'price' => 10
        ]);
        $drug->save();
        $drug = new \App\Drug([
            'name' => 'paracetamol',
            'price' => 5
        ]);
        $drug->save();
        $drug = new \App\Drug([
            'name' => 'tramol',
            'price' => 100
        ]);
        $drug->save();
        $drug = new \App\Drug([
            'name' => 'Panadol Extra',
            'price' => 10
        ]);
        $drug->save();
        $drug = new \App\Drug([
            'name' => 'sebtrain',
            'price' => 20
        ]);
        $drug->save();
    }
}
