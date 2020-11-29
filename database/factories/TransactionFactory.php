<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * Min and max transaction amount
     *
     * @var int
     */
    const MIN_AMOUNT = 1;
    const MAX_AMOUNT = 100000000;

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected string $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     * @throws \Exception
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random(),
            'amount' => random_int(self::MIN_AMOUNT, self::MAX_AMOUNT),
            'type' => Transaction::TRANSACTION_DEBIT,
        ];
    }
}
