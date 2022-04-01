<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Centro;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         // La creación de datos de roles debe ejecutarse primero
         $this->call(RoleTableSeeder::class);    // Los usuarios necesitarán los roles previamente generados
         $this->call(UserTableSeeder::class);

        // \App\Models\User::factory(10)->create();
       $centros = [
           [
            'id' => '9207',
            'nom_centro' => 'CENTRO NACIONAL COLOMBO ALEMÁN'
           ],

        ];

        foreach ($centros as $centro) {
            Centro::create($centro);
        }
    }
}
