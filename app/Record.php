<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    const CREDIT = 1;
    const DEBIT = 2;

    const TYPES = [
        self::CREDIT => 'Credit',
        self::DEBIT => 'Debit'
    ];


    protected $fillable = [
        'wallet_id',
        'amount',
        'type'
    ];
}
