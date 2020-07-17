<?php

namespace App\Actions;

use InvalidArgumentException;

/**
 * Class TransactionData
 * @package App\Actions
 */
class TransactionData
{
    public float $amount;
    public int $bankAccountId;
    public int $typeId;

    /**
     * TransactionData constructor.
     * @param $amount
     * @param $bankAccountId
     * @param $typeId
     */
    private function __construct($amount, $bankAccountId, $typeId)
    {
        $this->amount = $amount;
        $this->bankAccountId = $bankAccountId;
        $this->typeId = $typeId;
    }

    /**
     * @param array $request
     * @return TransactionData
     */
    public static function fromRequest(array $request): TransactionData
    {
        if (!isset($request['amount'])) {
            throw new InvalidArgumentException("'amount' is required");
        }

        if (!isset($request['bankAccountId'])) {
            throw new InvalidArgumentException("'bankAccountId' is required");
        }

        if (!isset($request['typeId'])) {
            throw new InvalidArgumentException("'typeId' is required");
        }

        return new self(
            $request['amount'],
            $request['bankAccountId'],
            $request['typeId']
        );
    }
}
