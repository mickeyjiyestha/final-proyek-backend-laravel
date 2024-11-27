<?php

namespace Database\Seeders;

use App\Models\Cryptocurrency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CryptocurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cryptocurrency::create(['name' => 'Bitcoin', 'symbol' => 'BTC']);
        Cryptocurrency::create(['name' => 'Ethereum', 'symbol' => 'ETH']);
        Cryptocurrency::create(['name' => 'Litecoin', 'symbol' => 'LTC']);
        Cryptocurrency::create(['name' => 'Dogecoin', 'symbol' => 'DOGE']);
        Cryptocurrency::create(['name' => 'Monero', 'symbol' => 'XMR']);
        Cryptocurrency::create(['name' => 'Ripple', 'symbol' => 'XRP']);
        Cryptocurrency::create(['name' => 'Stellar', 'symbol' => 'XLM']);
        Cryptocurrency::create(['name' => 'Cardano', 'symbol' => 'ADA']);
        Cryptocurrency::create(['name' => 'Solana', 'symbol' => 'SOL']);
        Cryptocurrency::create(['name' => 'Polkadot', 'symbol' => 'DOT']);
        Cryptocurrency::create(['name' => 'Tezos', 'symbol' => 'XTZ']);
        Cryptocurrency::create(['name' => 'Binance Coin', 'symbol' => 'BNB']);
        Cryptocurrency::create(['name' => 'Tether', 'symbol' => 'USDT']);
        Cryptocurrency::create(['name' => 'USD Coin', 'symbol' => 'USDC']);
        Cryptocurrency::create(['name' => 'Chainlink', 'symbol' => 'LINK']);
        Cryptocurrency::create(['name' => 'Uniswap', 'symbol' => 'UNI']);
        Cryptocurrency::create(['name' => 'Avalanche', 'symbol' => 'AVAX']);
        Cryptocurrency::create(['name' => 'Cosmos', 'symbol' => 'ATOM']);
        Cryptocurrency::create(['name' => 'Dai', 'symbol' => 'DAI']);
    }
}