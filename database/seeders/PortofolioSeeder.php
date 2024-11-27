<?php

namespace Database\Seeders;

use App\Models\Portofolio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortofolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Portofolio::create(['user_id' => 1, 'cryptocurrency_id' => 1, 'amount' => 10]);
        Portofolio::create(['user_id' => 1, 'cryptocurrency_id' => 2, 'amount' => 20]);
        Portofolio::create(['user_id' => 2, 'cryptocurrency_id' => 3, 'amount' => 30]);
        Portofolio::create(['user_id' => 3, 'cryptocurrency_id' => 4, 'amount' => 40]);
        Portofolio::create(['user_id' => 4, 'cryptocurrency_id' => 5, 'amount' => 50]);
        Portofolio::create(['user_id' => 4, 'cryptocurrency_id' => 6, 'amount' => 60]);
        Portofolio::create(['user_id' => 6, 'cryptocurrency_id' => 7, 'amount' => 70]);
        Portofolio::create(['user_id' => 7, 'cryptocurrency_id' => 8, 'amount' => 80]);
        Portofolio::create(['user_id' => 8, 'cryptocurrency_id' => 9, 'amount' => 90]);
        Portofolio::create(['user_id' => 9, 'cryptocurrency_id' => 10, 'amount' => 100]);
        Portofolio::create(['user_id' => 10, 'cryptocurrency_id' => 11, 'amount' => 110]);
    }
}