<?php

use App\Currencies;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstOrCreate(
            ['email' => 'joao@email.com'],
            [
                'name' => 'Joao Aires',
                'email' => 'joao@email.com',
                'password' => Hash::make('qweqwe')
            ]
        );

        if (count($user->currencies) == 0) {
            $user->currencies()->sync(Currencies::currenciesId());
        }

        $items = $user->currencies;

        $items[0]->pivot->balance = 1.556;
        $items[0]->pivot->save();
        $items[1]->pivot->balance = 14.075;
        $items[1]->pivot->save();
        $items[3]->pivot->balance = 9.771;
        $items[3]->pivot->save();
        $items[4]->pivot->balance = 55.286;
        $items[4]->pivot->save();
    }
}
