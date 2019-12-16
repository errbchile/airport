<?php

use Illuminate\Database\Seeder;
use App\PiezaTipo;

class PiezaTiposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\PiezaTipo::class)->create(['nombre' => 'Motor (Engine)', 'eliminable' => 0]);
        factory(App\PiezaTipo::class)->create(['nombre' => 'Neumático (Tire)', 'eliminable' => 0]);
        factory(App\PiezaTipo::class)->create(['nombre' => 'Reservorio de Aceite (Oil Reservoir)', 'eliminable' => 0]);
        factory(App\PiezaTipo::class)->create(['nombre' => 'Hélice (Propeller)', 'eliminable' => 0]);
    }
}
