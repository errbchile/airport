<?php

use Illuminate\Database\Seeder;

class PilotoTiposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\PilotoTipo::class)->create(['nombre' => 'Piloto']); //id 1
        factory(App\PilotoTipo::class)->create(['nombre' => 'Instructor']); //id 2
        factory(App\PilotoTipo::class)->create(['nombre' => 'Alumno Piloto']); //id 3
    }
}
