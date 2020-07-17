<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    /**
     * @var array
     */
    protected $fillable=[
        "agency",
        "number",
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
        return $this->transactions()->deposits()->get();
    }

    /**
     * @return mixed
     */
    public function withdraws()
    {
        return $this->transactions()->withdraws()->get();
    }

    /**
     * @return float
     */
    public function balance(): float
    {
        return $this->deposits()->sum() - $this->withdraws()->sum();
    }
}
