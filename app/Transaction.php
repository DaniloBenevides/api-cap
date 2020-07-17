<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Transaction
 * @package App
 */
class Transaction extends Model
{
    const DEPOSIT_TYPE = 1;
    const WITHDRAW_TYPE = 2;

    protected $fillable = [
        'amount',
        'type_id',
        'bank_account_id'
    ];

    /**
     * @param $query
     * @return mixed
     */
    public function scopeDeposits($query)
    {
        return $query->where('type_id', self::DEPOSIT_TYPE);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeWithdraws($query)
    {
        return $query->where('type_id', self::WITHDRAW_TYPE);
    }
}
