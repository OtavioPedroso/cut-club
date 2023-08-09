<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'id' => 1,
            'name' => 'Cutclub',
            'email' => 'cutclubuepg2023@gmail.com',
            'password' => Hash::make('B4rbear1a321'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
