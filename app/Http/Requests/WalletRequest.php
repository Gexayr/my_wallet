<?php

namespace App\Http\Requests;

use App\Wallet;
use Illuminate\Foundation\Http\FormRequest;

class WalletRequest extends FormRequest
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
        $types = Wallet::CASH . ',' . Wallet::CREDIT_CARD . ',' . Wallet::CRYPTO_CURRENCY;
        return [
            'name'    => 'required|min:3|max:200',
            'type'      => 'in:' . $types
        ];
    }
}
