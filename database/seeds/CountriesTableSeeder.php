<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Country::class)->create([
            'nombre' => 'Chile',
            'iso_2' => 'CL',
            'iso_3' => 'CHL',
            'oaci' => 'CC'
        ]);
    }
}
