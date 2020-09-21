<?php

namespace App\Http\Requests;

use App\Currencies;
use App\Rules\CheckCurrencyAmount;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ExchangeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'currency' => 'required',
            'currency_amount' => ['required', new CheckCurrencyAmount(
                $this->currency,
                $this->currency_amount
            )],
            'to_currency' => 'required'
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $user = $this->user();
        $currency = $user->currencies()
            ->with('conversion')
            ->whereName(strtoupper($this->currency))
            ->first();
        $toCurrency = $user->currencies()
            ->with('conversion')
            ->whereName(strtoupper($this->to_currency))
            ->first();
            
        $this->merge([
            'user' => $user,
            'currency' => $currency,
            'to_currency' => $toCurrency,
        ]);
    }

    /**
     * If validator fails return the exception in json form
     * @param Validator $validator
     * @return array
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'errors' => $validator->errors()->all()
            ], 400)
        );
    }
}
