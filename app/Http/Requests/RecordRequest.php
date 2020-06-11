<?php

namespace App\Http\Requests;

use App\Record;
use Illuminate\Foundation\Http\FormRequest;

class RecordRequest extends FormRequest
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
        $types = Record::CREDIT . ',' . Record::DEBIT;
        return [
            'amount'    => 'required|numeric',
            'wallet_id'    => 'required|exists:wallets,id',
            'type'      => 'in:' . $types
        ];
    }
}
