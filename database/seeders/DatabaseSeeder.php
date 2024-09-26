<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'username' => 'kowalsky',
            'email' => 'milkiainun@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Tlogorejo1234'),
            'remember_token' => Str::random(10),
        ]);
    }
}
