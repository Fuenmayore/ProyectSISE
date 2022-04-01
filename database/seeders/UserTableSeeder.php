<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'user')->first();
        $role_admin = Role::where('name', 'admin')->first();
        $role_cesar = Role::where('name', 'cesar')->first();
        $role_adriana = Role::where('name', 'adriana')->first();
        $role_aldo = Role::where('name', 'aldo')->first();
        $role_elkin = Role::where('name', 'elkin')->first();
        $role_hui = Role::where('name', 'hui')->first();
        $role_jose = Role::where('name', 'jose')->first();
        $role_manuel = Role::where('name', 'manuel')->first();
        $role_olga = Role::where('name', 'olga')->first();
        $role_roberto = Role::where('name', 'roberto')->first();



        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@sise.com';
        $user->password = bcrypt('secret');
        $user->fullacces = 'yes';
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'User';
        $user->email = 'user@sise.com';
        $user->password = bcrypt('secret');
        $user->fullacces = 'no';
        $user->save();
        $user->roles()->attach($role_user);

        $user = new User();
        $user->name = 'Adriana Mariño';
        $user->email = 'adrianamari1@sise.com';
        $user->password = bcrypt('adriana1');
        $user->fullacces = 'adriana';
        $user->save();
        $user->roles()->attach($role_adriana);


        $user = new User();
        $user->name = 'Aldo Silvera';
        $user->email = 'aldosilvera2@sise.com';
        $user->password = bcrypt('aldo2');
        $user->fullacces = 'aldo';
        $user->save();
        $user->roles()->attach($role_aldo);

        $user = new User();
        $user->name = 'Cesar Velez';
        $user->email = 'cesarvelez3@sise.com';
        $user->password = bcrypt('cesar3');
        $user->fullacces = 'cesar';
        $user->save();
        $user->roles()->attach($role_cesar);

        $user = new User();
        $user->name = 'Elkin Pertuz';
        $user->email = 'elkinpertuz4@sise.com';
        $user->password = bcrypt('elkin4');
        $user->fullacces = 'elkin';
        $user->save();
        $user->roles()->attach($role_elkin);

        $user = new User();
        $user->name = 'Hui Industria';
        $user->email = 'huiindustria5@sise.com';
        $user->password = bcrypt('hui5');
        $user->fullacces = 'hui';
        $user->save();
        $user->roles()->attach($role_hui);

        $user = new User();
        $user->name = 'Jose Ramirez';
        $user->email = 'joseramirez6@sise.com';
        $user->password = bcrypt('jose6');
        $user->fullacces = 'jose';
        $user->save();
        $user->roles()->attach($role_jose);

        $user = new User();
        $user->name = 'Manuel Hormechea';
        $user->email = 'manuelhormeche7@sise.com';
        $user->password = bcrypt('manuel7');
        $user->fullacces = 'manuel';
        $user->save();
        $user->roles()->attach($role_manuel);

        $user = new User();
        $user->name = 'Olga Blanco';
        $user->email = 'olgablanco8@sise.com';
        $user->password = bcrypt('olga8');
        $user->fullacces = 'olga';
        $user->save();
        $user->roles()->attach($role_olga);

        $user = new User();
        $user->name = 'Roberto Morales';
        $user->email = 'robertomoraes9@sise.com';
        $user->password = bcrypt('roberto9');
        $user->fullacces = 'roberto';
        $user->save();
        $user->roles()->attach($role_roberto);


    }
}
