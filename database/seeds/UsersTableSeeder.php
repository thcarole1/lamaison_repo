<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Création de 2 users (avec les rôles de host et d'admin)
        App\User::create([
            'name' => 'host',
            'email' => 'host@hotmail.com',
            'role' => 'host',
            'password' => Hash::make('host')
        ]);

        App\User::create([
            'name' => 'admin',
            'email' => 'admin@hotmail.com',
            'role' => 'admin',
            'password' => Hash::make('admin') 
        ]);
        // factory(App\User::class, 1)->create();
    }
}
