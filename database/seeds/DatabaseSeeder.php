<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$this->call([
            AirplaneBrandsTableSeeder::class, 
            AirplanesTableSeeder::class,
            PilotoTiposTableSeeder::class, 
            UsersTableSeeder::class,
            VueloTiposTableSeeder::class,
            CountriesTableSeeder::class,
            RegionsTableSeeder::class,
            PiezaTiposTableSeeder::class,
            PiezaFabricantesTableSeeder::class,
            MantencionTareaListsTableSeeder::class,
            MantencionTiposTableSeeder::class,
	    ]);
    }
}
