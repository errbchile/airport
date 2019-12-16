<?php

use Illuminate\Database\Seeder;

class MantencionTareaListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\MantencionTareaList::class)->create(['descripcion' => 'Nivelación del Avión', 'eliminable' => 0]);
        factory(App\MantencionTareaList::class)->create(['descripcion' => 'Ajuste del Tren de Aterrizaje', 'eliminable' => 0]);
        factory(App\MantencionTareaList::class)->create(['descripcion' => 'Cambio de Bujías', 'eliminable' => 0]);
        factory(App\MantencionTareaList::class)->create(['descripcion' => 'Cambio de Filtro de Aceite', 'eliminable' => 0]);
        factory(App\MantencionTareaList::class)->create(['descripcion' => 'Cambio de Hélices', 'eliminable' => 0]);
        factory(App\MantencionTareaList::class)->create(['descripcion' => 'Chequear dispositivo Anti-Hielo', 'eliminable' => 0]);
        factory(App\MantencionTareaList::class)->create(['descripcion' => 'Revisar Bomba de Combustible', 'eliminable' => 0]);
        factory(App\MantencionTareaList::class)->create(['descripcion' => 'Chequear conexiones del sistema hidráulico', 'eliminable' => 0]);
        factory(App\MantencionTareaList::class)->create(['descripcion' => 'Sustituir Parabrisas', 'eliminable' => 0]);
        factory(App\MantencionTareaList::class)->create(['descripcion' => 'Chequear y ajustar bancada Porta Motor', 'eliminable' => 0]);
        factory(App\MantencionTareaList::class)->create(['descripcion' => 'Reemplazar Anillos de Motor', 'eliminable' => 0]);
    }
}
