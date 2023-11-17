<?php

namespace Database\Seeders;

use App\Models\User;
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
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Prueba',
            'email' => 'prueba@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('pruebaazurian2023'),
        ]);
    }
}
