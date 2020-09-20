<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currencies extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'currencies';

    /**
     * Get the conversion record associated with the currency.
     */
    public function conversion()
    {
        return $this->hasOne('App\CurrenciesConversion', 'currency_id');
    }
    
    /**
     * Create conversion value for this currency
     * @param array $arrayConv
     * @return void
     */
    public function createConversion($arrayConv)
    {
        $conversion = $this->conversion;

        if ($conversion)
            return;
        
        $conversion = new CurrenciesConversion();

        $conversion->currency_id = $this->id;
        $conversion->btc_value = $arrayConv['btc_value'];
        $conversion->usd_value = $arrayConv['usd_value'];
        $conversion->save();
    }
}
