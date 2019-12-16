<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Mecánico de Prueba
        $u = factory(App\User::class)->create([
            'rol' => '3',
            'rut' => '1.234.567-8',
            'name' => 'Mecánico',
            'lastname_paterno' => 'Prueba',
            'lastname_materno' => 'Lopez',
            'telefono' => '950644214',
            'email' => 'mecanico@gmail.com',
            'password' => Hash::make('1234'),      
         ]);
            factory(App\Piloto::class)->create([
              'user_id' => $u->id,
            ]);
         
         //PILOTOS
					$u = factory(App\User::class)->create([
            'rol' => '1',
            'rut' => '8.765.432-1',
            'name' => 'Peter',
            'lastname_paterno' => 'Petrelli',
            'lastname_materno' => 'Stevenson',
            'telefono' => '999888777',
            'email' => 'Peter@gmail.com',
            'password' => Hash::make('1234'),      
         ]);
         $p = factory(App\Piloto::class)->create([
              'user_id' => $u->id,
               'saldo' => 500000,
               'licencia_start' => '2019-01-01',
               'licencia_end' => '2019-01-01',
          ]);
         factory(App\PilotoHora::class)->create([
					  'fecha' => date('Y-m-d'),
					   'piloto_id' => $p->id,
					   'horas' => '0',
					   'acumuladas' => '0',
					   'descripcion' => 'Inicializar Sistema',
					   'tipo' => '0'
					]);
					factory(App\PilotoSaldo::class)->create([
             'fecha' => date('Y-m-d'),
             'piloto_id' => $p->id,
             'monto' => '0',
             'saldoactual' => '0',
             'forma_pago' => '0',
             'descripcion' => 'Carga Inicial',
             'tipo' => '0'
          ]);
            factory(App\PilotoAirplaneModel::class)->create([
              'piloto_id' => $p->id,
               'airplane_model_id' => 1
            ]);
              
         //administrador
         
					$u = factory(App\User::class)->create([
           'rol' => '2',
            'rut' => '12.181.334-9',
            'name' => 'Admin',
            'lastname_paterno' => 'admini',
            'lastname_materno' => 'adminis',
           'telefono' => '132435678',
           'email' => 'admin@mail.cl',
           'password' => Hash::make('1234'),      
          ]);
    }
}
