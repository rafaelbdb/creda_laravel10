<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('movements')->insert([
            ['user_id' => 1, 'category_id' => 1, 'amount' => 1000, 'date' => '2021-05-01', 'description' => 'Salary'],
            ['user_id' => 1, 'category_id' => 2, 'amount' => 100, 'date' => '2021-05-02', 'description' => 'Food'],
            ['user_id' => 1, 'category_id' => 3, 'amount' => 50, 'date' => '2021-05-03', 'description' => 'Transport'],
            ['user_id' => 1, 'category_id' => 4, 'amount' => 200, 'date' => '2021-05-04', 'description' => 'House'],
            ['user_id' => 1, 'category_id' => 5, 'amount' => 100, 'date' => '2021-05-05', 'description' => 'Fun'],
            ['user_id' => 1, 'category_id' => 6, 'amount' => 100, 'date' => '2021-05-06', 'description' => 'Other'],
            ['user_id' => 2, 'category_id' => 1, 'amount' => 21000, 'date' => '2021-05-01', 'description' => 'Salary'],
            ['user_id' => 2, 'category_id' => 2, 'amount' => 2100, 'date' => '2021-05-02', 'description' => 'Food'],
            ['user_id' => 2, 'category_id' => 3, 'amount' => 250, 'date' => '2021-05-03', 'description' => 'Transport'],
            ['user_id' => 2, 'category_id' => 4, 'amount' => 2200, 'date' => '2021-05-04', 'description' => 'House'],
            ['user_id' => 2, 'category_id' => 5, 'amount' => 2100, 'date' => '2021-05-05', 'description' => 'Fun'],
            ['user_id' => 2, 'category_id' => 6, 'amount' => 2100, 'date' => '2021-05-06', 'description' => 'Other'],
        ]);
    }
}
