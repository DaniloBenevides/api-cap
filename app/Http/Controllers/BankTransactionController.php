<?php

namespace App\Http\Controllers;

use App\Actions\Deposit;
use App\Actions\Withdraw;
use App\Actions\TransactionData;
use App\Http\Requests\DepositRequest;
use App\Http\Requests\WithdrawRequest;

class BankTransactionController extends Controller
{
    /**
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
    public function deposit(DepositRequest $request, Deposit $deposit)
    {
        $transactionData = TransactionData::fromRequest($request->validated());
        $transaction = $deposit($transactionData);
        return $transaction;
    }

    /**
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
    public function withdraw(WithdrawRequest $request, Withdraw $withdraw)
    {
        $transactionData = TransactionData::fromRequest($request->validated());
        $transaction = $withdraw($transactionData);
            
        return $transaction;
    }
}
