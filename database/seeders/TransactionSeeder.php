<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class TransactionSeeder extends Seeder
{
    /**
     * Number of seeds
     *
     * @const
     */
    const SEEDS = 5000;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Transaction::factory(self::SEEDS)
            ->state(new Sequence(
                ['type' => Transaction::TRANSACTION_DEBIT],
                ['type' => Transaction::TRANSACTION_CREDIT],
            ))
            ->create();
    }
}
