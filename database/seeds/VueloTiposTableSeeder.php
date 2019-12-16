<?php

use Illuminate\Database\Seeder;

class VueloTiposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\VueloTipo::class)->create(['nombre' => 'Turistico', 'monto' => '70000', 'min_hora' => '0.5', 'eliminable' => '0']);
        factory(App\VueloTipo::class)->create(['nombre' => 'Popular', 'monto' => '40000', 'min_hora' => '0.3', 'eliminable' => '0']);
        factory(App\VueloTipo::class)->create(['nombre' => 'Taxeo', 'monto' => '130000', 'min_hora' => '0.5', 'eliminable' => '0']);
        factory(App\VueloTipo::class)->create(['nombre' => 'Instrucción', 'monto' => '70000', 'min_hora' => '0.5', 'eliminable' => '0']);
        factory(App\VueloTipo::class)->create(['nombre' => 'Privado', 'monto' => '140000', 'min_hora' => '0.5', 'eliminable' => '0']);
        factory(App\VueloTipo::class)->create(['nombre' => 'Escalas', 'monto' => '10000', 'min_hora' => '0.5', 'eliminable' => '0']);
    }
}
