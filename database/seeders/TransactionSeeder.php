<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transaction::create(['portofolio_id' => 1, 'transaction_type' => 'buy', 'amount' => 10, 'price' => 10000]);
        Transaction::create(['portofolio_id' => 2, 'transaction_type' => 'sell', 'amount' => 20, 'price' => 20000]);
        Transaction::create(['portofolio_id' => 3, 'transaction_type' => 'buy', 'amount' => 30, 'price' => 30000]);
        Transaction::create(['portofolio_id' => 4, 'transaction_type' => 'sell', 'amount' => 40, 'price' => 40000]);
        Transaction::create(['portofolio_id' => 5, 'transaction_type' => 'buy', 'amount' => 50, 'price' => 50000]);
        Transaction::create(['portofolio_id' => 6, 'transaction_type' => 'sell', 'amount' => 60, 'price' => 60000]);
        Transaction::create(['portofolio_id' => 7, 'transaction_type' => 'buy', 'amount' => 70, 'price' => 70000]);
        Transaction::create(['portofolio_id' => 8, 'transaction_type' => 'sell', 'amount' => 80, 'price' => 80000]);
        Transaction::create(['portofolio_id' => 9, 'transaction_type' => 'buy', 'amount' => 90, 'price' => 90000]);
        Transaction::create(['portofolio_id' => 10, 'transaction_type' => 'sell', 'amount' => 100, 'price' => 100000]);
    }
}