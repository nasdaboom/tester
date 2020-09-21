<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CheckCurrencyAmount implements Rule
{
    public $currency;
    public $currencyAmount;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($currency, $currencyAmount)
    {
        $this->currency = $currency;
        $this->currencyAmount = $currencyAmount;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (
            $this->currency && 
            $this->currency->pivot->balance >= $this->currencyAmount
        ) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Insufficient balance.';
    }
}
