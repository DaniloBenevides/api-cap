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
		try {
			$transactionData = TransactionData::fromRequest($request->validated());
			$transaction = $deposit($transactionData);
		}catch(\Exception $e) {
			abort(422, $e->getMessage());
		}

        return $transaction;
    }

    /**
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
    public function withdraw(WithdrawRequest $request, Withdraw $withdraw)
    {
		try {
			$transactionData = TransactionData::fromRequest($request->validated());
			$transaction = $withdraw($transactionData);
		}catch(\Exception $e){ 
			abort(422, $e->getMessage());
		}

		return $transaction;
    }
}
