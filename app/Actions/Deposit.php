<?php

namespace App\Actions;

use App\BankAccount;
use App\Transaction;
use App\Actions\TransactionData;
use DomainException;

class Deposit
{
    /**
     * @param \App\Actions\TransactionData $transactionData
     * @return Transaction
     */
    public function __invoke(TransactionData $transactionData): Transaction
    {
        $bankAccount = BankAccount::find($transactionData->bankAccountId);

        if (is_null($bankAccount)) {
            throw new DomainException('Conta bancaria inexistente');
        }

        $transaction = Transaction::create([
            'bank_account_id'=>$transactionData->bankAccountId,
            'amount'=>$transactionData->amount,
            'type_id'=>$transactionData->typeId,
        ]);

        return $transaction;
    }
}
