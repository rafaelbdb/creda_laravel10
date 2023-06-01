<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Rafael Borges',
            'email' => 'rafaelbdb@gmail.com',
            'password' => Hash::make('asdfasdf'),
        ]);

        User::create([
            'name' => 'User A',
            'email' => 'a@b.com',
            'password' => Hash::make('asdfasdf'),
        ]);
    }
}
