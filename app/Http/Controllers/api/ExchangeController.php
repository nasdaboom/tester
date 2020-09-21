<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExchangeRequest;
use App\Http\Resources\ExchangeResource;

class ExchangeController extends Controller
{
    /**
     * @api {POST} /api/exchange
     * @description Convert currencies
     * @param ExchangeRequest $request
     * @return ExchangeResource
     */
    public function exchange(ExchangeRequest $request)
    {
        $this->makeExchange($request);
        return new ExchangeResource($request->user);
    }

    /**
     * Make the currencies exchange
     * @param object $request
     * @return void
     */
    private function makeExchange($request)
    {
        $amount = $request->currency_amount;
        $currency = $request->currency;
        $toCurrency = $request->to_currency;

        $toUsdValue = $amount * $currency->conversion->usd_value;
        $toCurrencyValue = $toUsdValue / $toCurrency->conversion->usd_value;

        $currency->pivot->balance -= $amount;
        $currency->pivot->save();

        $toCurrency->pivot->balance += $toCurrencyValue;
        $toCurrency->pivot->save();
    }
}
