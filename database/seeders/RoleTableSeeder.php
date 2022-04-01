<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = 'admin';
        $role->description = 'Administrator';
        $role->save();

        $role = new Role();
        $role->name = 'user';
        $role->description = 'User';
        $role->save();

        $role = new Role();
        $role->name = 'cesar';
        $role->description = 'Cesar';
        $role->save();

        $role = new Role();
        $role->name = 'adriana';
        $role->description = 'Adriana';
        $role->save();

        $role = new Role();
        $role->name = 'aldo';
        $role->description = 'Aldo';
        $role->save();

        $role = new Role();
        $role->name = 'elkin';
        $role->description = 'Elkin';
        $role->save();

        $role = new Role();
        $role->name = 'hui';
        $role->description = 'Hui';
        $role->save();

        $role = new Role();
        $role->name = 'jose';
        $role->description = 'Jose';
        $role->save();

        $role = new Role();
        $role->name = 'manuel';
        $role->description = 'Manuel';
        $role->save();

        $role = new Role();
        $role->name = 'olga';
        $role->description = 'Olga';
        $role->save();

        $role = new Role();
        $role->name = 'roberto';
        $role->description = 'Roberto';
        $role->save();
    }
}
