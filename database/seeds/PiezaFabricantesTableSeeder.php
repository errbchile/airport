<?php

use Illuminate\Database\Seeder;

class PiezaFabricantesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\PiezaFabricante::class)->create(['nombre' => 'Boeing', 'eliminable' => 0]);
        factory(App\PiezaFabricante::class)->create(['nombre' => 'Airbus Group', 'eliminable' => 0]);
        factory(App\PiezaFabricante::class)->create(['nombre' => 'Lockheed Martin', 'eliminable' => 0]);
        factory(App\PiezaFabricante::class)->create(['nombre' => 'United Technologies', 'eliminable' => 0]);
        factory(App\PiezaFabricante::class)->create(['nombre' => 'Cessna', 'eliminable' => 0]);
    }
}
