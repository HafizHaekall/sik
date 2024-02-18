<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('users')->insert([
            'name' => 'Hafiz',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => '1',
        ]);

        // DB::table('users')->insert([
        //     'name' => 'Haekal',
        //     'email' => 'user@gmail.com',
        //     'password' => Hash::make('user'),
        //     'role' => '1',
        // ]);

    }
}
