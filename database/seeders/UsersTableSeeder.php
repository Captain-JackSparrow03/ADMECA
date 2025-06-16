<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // // Désactive les vérifications de contraintes de clé étrangère
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // DB::table('users')->truncate();
        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@admeca.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'), // mot de passe: "password"
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // [
            //     'name' => 'John Doe',
            //     'email' => 'john@example.com',
            //     'email_verified_at' => now(),
            //     'password' => Hash::make('secret'),
            //     'remember_token' => Str::random(10),
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'name' => 'Jane Smith',
            //     'email' => 'jane@example.com',
            //     'email_verified_at' => null, // non vérifié
            //     'password' => Hash::make('123456'),
            //     'remember_token' => Str::random(10),
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
        ];

        DB::table('users')->insert($users);

        // // Optionnel: Création de 10 utilisateurs fictifs supplémentaires
        // \App\Models\User::factory(10)->create();
    }
}