<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetWalletRequest;
use App\Http\Resources\GetWalletResource;

class WalletController extends Controller
{
    /**
     * @api {GET} /api/wallet
     * @description Get list of currencies and user balance
     * @param GetWalletRequest $request
     * @return GetWalletResource
     */
    public function getWallet(GetWalletRequest $request)
    {
        return new GetWalletResource($request->user());
    }
}
