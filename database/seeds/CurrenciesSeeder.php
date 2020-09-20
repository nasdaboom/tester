<?php

use App\Currencies;
use App\CurrenciesConversion;
use Illuminate\Database\Seeder;

class CurrenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $btc = Currencies::updateOrCreate(
            ['name' => 'BTC'],
            [
                'name' => 'BTC',
                'description' => 'Bitcoin',
                'image' => 'https://s2.coinmarketcap.com/static/img/coins/64x64/1.png'
            ]
        );

        $btc->createConversion([
            'btc_value' => 1,
            'usd_value' => 10891.31
        ]);

        $ltc = Currencies::updateOrCreate(
            ['name' => 'LTC'],
            [
                'name' => 'LTC',
                'description' => 'Litecoin',
                'image' => 'https://s2.coinmarketcap.com/static/img/coins/64x64/2.png'
            ]
        );

        $ltc->createConversion([
            'btc_value' => 0.00433322,
            'usd_value' => 47.15
        ]);

        $dash = Currencies::updateOrCreate(
            ['name' => 'DASH'],
            [
                'name' => 'DASH',
                'description' => 'Dash',
                'image' => 'https://s2.coinmarketcap.com/static/img/coins/64x64/131.png'
            ]
        );

        $dash->createConversion([
            'btc_value' => 0.00646016,
            'usd_value' => 70.28
        ]);

        $eth = Currencies::updateOrCreate(
            ['name' => 'ETH'],
            [
                'name' => 'ETH',
                'description' => 'Ethereum',
                'image' => 'https://s2.coinmarketcap.com/static/img/coins/64x64/1027.png'
            ]
        );

        $eth->createConversion([
            'btc_value' => 0.03405207,
            'usd_value' => 370.43
        ]);

        $bch = Currencies::updateOrCreate(
            ['name' => 'BCH'],
            [
                'name' => 'BCH',
                'description' => 'Bitcoin Cash',
                'image' => 'https://s2.coinmarketcap.com/static/img/coins/64x64/1831.png'
            ]
        );

        $bch->createConversion([
            'btc_value' => 0.02069485,
            'usd_value' => 225.01
        ]);

        $usdt = Currencies::updateOrCreate(
            ['name' => 'USDT'],
            [
                'name' => 'USDT',
                'description' => 'Tether',
                'image' => 'https://s2.coinmarketcap.com/static/img/coins/64x64/825.png'
            ]
        );

        $usdt->createConversion([
            'btc_value' => 0.00009213,
            'usd_value' => 1
        ]);
    }
}
