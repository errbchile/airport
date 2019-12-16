<?php

use Illuminate\Database\Seeder;

class AirplaneBrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $r = factory(App\AirplaneBrand::class)->create([
	        'nombre' => 'CESSNA'
        ]);
        factory(App\AirplaneModel::class)->create([
            'airplane_brand_id' => $r->id,
	        'nombre' => 'R172K'
        ]);
        factory(App\AirplaneModel::class)->create([
            'airplane_brand_id' => $r->id,
            'nombre' => '172N'
        ]);
        factory(App\AirplaneModel::class)->create([
            'airplane_brand_id' => $r->id,
            'nombre' => '172XP'
        ]);
        factory(App\AirplaneModel::class)->create([
            'airplane_brand_id' => $r->id,
            'nombre' => '172P'
        ]);
         
    }
}
