<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    const CASH = 1;
    const CREDIT_CARD = 2;
    const CRYPTO_CURRENCY = 3;

    const TYPES = [
        self::CASH => 'Cash',
        self::CREDIT_CARD => 'Credit Card',
        self::CRYPTO_CURRENCY => 'Crypto Currency',
    ];

    protected $fillable = [
        'user_id',
        'name',
        'amount',
        'type'
    ];
}
