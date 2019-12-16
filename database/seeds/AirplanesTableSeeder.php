<?php

use Illuminate\Database\Seeder;

class AirplanesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = factory(App\Airplane::class)->create([
          'patente' => 'AA-AAA',
	        'airplane_model_id' => 4,
	        'permiso' => '1981',
	        'horasactuales' => 920,
	        'horasdevuelo' => 5299,  
	        'vencimiento'=> '2019-09-30',
    	 ]);
        factory(App\AirplaneHora::class)->create([
          'fecha' => date('Y-m-d'),
           'airplane_id' => $a->id,
           'horas' => '0',
           'acumuladas' => $a->horasdevuelo,
           'descripcion' => 'Inicializar Sistema',
           'tipo' => '0'
        ]);

        $a = factory(App\Airplane::class)->create([
            'patente' => 'BB-BBB',
            'airplane_model_id' => 1,
            'permiso' => '1980',
            'horasactuales' => 500,
            'horasdevuelo' => 22100,  
            'vencimiento'=> '2020-05-07',
         ]);
        factory(App\AirplaneHora::class)->create([
          'fecha' => date('Y-m-d'),
           'airplane_id' => $a->id,
           'horas' => '0',
           'acumuladas' => $a->horasdevuelo,
           'descripcion' => 'Inicializar Sistema',
           'tipo' => '0'
        ]);

        $a = factory(App\Airplane::class)->create([
            'patente' => 'CC-CCC',
            'airplane_model_id' => 1,
            'permiso' => '1980',
            'horasactuales' => 547,
            'horasdevuelo' => 25000,  
            'vencimiento'=> '2020-05-16',
         ]);
        factory(App\AirplaneHora::class)->create([
          'fecha' => date('Y-m-d'),
           'airplane_id' => $a->id,
           'horas' => '0',
           'acumuladas' => $a->horasdevuelo,
           'descripcion' => 'Inicializar Sistema',
           'tipo' => '0'
        ]);
        
        $a = factory(App\Airplane::class)->create([
            'patente' => 'DD-DDD',
            'airplane_model_id' => 2,
            'permiso' => '1979',
            'horasactuales' => 252,
            'horasdevuelo' => 23500,  
            'vencimiento'=> '2021-06-17',
         ]);
        factory(App\AirplaneHora::class)->create([
          'fecha' => date('Y-m-d'),
           'airplane_id' => $a->id,
           'horas' => '0',
           'acumuladas' => $a->horasdevuelo,
           'descripcion' => 'Inicializar Sistema',
           'tipo' => '0'
        ]);
    }
}
