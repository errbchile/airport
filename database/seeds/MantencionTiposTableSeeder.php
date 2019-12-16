<?php

use Illuminate\Database\Seeder;

class MantencionTiposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\MantencionTipo::class)->create(['nombre' => '50 Horas', 'tacometro' => 50]);
        factory(App\MantencionTipo::class)->create(['nombre' => '100 Horas', 'tacometro' => 100]);
        factory(App\MantencionTipo::class)->create(['nombre' => '200 Horas', 'tacometro' => 200]);
        factory(App\MantencionTipo::class)->create(['nombre' => '2000 Horas', 'tacometro' => 2000]);
        factory(App\MantencionTipo::class)->create(['nombre' => 'Reemplazo De Pieza']);
    }
}
