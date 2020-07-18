<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/bank-accounts/deposit', 'BankTransactionController@deposit')->name('bank-accounts.deposit');
Route::post('/bank-accounts/withdraw', 'BankTransactionController@withdraw')->name('bank-accounts.withdraw');
Route::get('/bank-accounts', 'BankAccountController@index')->name('bank-accounts.index');

