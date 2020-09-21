<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExchangeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $currencies = $this->currencies()->with('conversion')->get();

        return [
            'currencies' => GetWalletCollection::collection($currencies)
        ];
    }
}
