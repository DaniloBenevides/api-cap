<?php

use Illuminate\Database\Seeder;
use App\BankAccount;

class BankAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BankAccount::create([
            'agency' => '123',
            'number' => '123'
        ]);
    }
}
