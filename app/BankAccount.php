<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        "agency",
        "number",
    ];

	protected $appends = [
		"balance"
	];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     * @return mixed
     */
    public function deposits()
    {
        return $this->transactions()->deposits()->get()->pluck('amount');
    }

    /**
     * @return mixed
     */
    public function withdraws()
    {
        return $this->transactions()->withdraws()->get()->pluck('amount');
    }

    /**
     * @return float
     */
    public function getBalanceAttribute(): float
    {
        return $this->deposits()->sum() - $this->withdraws()->sum();
    }
}
