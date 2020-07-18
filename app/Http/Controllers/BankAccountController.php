<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BankAccount;

class BankAccountController extends Controller
{
    /**
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
    public function index(Request $request)
    {
		return BankAccount::all();
	}
}
