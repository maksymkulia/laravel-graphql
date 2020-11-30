<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Transaction;
use App\Models\User;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Illuminate\Validation\Rule;

class CreateTransactionMutation extends Mutation
{
    protected array $attributes = [
        'name' => 'createTransaction',
        'model' => Transaction::class,
    ];

    public function rules(array $args = []): array
    {
        return [
            'amount' => [
                'required', 'int', 'min:1'
            ],
            'type' => [
                'required', 'int', 'max:1'
            ],
        ];
    }

    public function type(): Type
    {
        return GraphQL::type('Transaction');
    }

    public function args(): array
    {
        return [
            'amount' => [
                'name' => 'amount',
                'type' =>  Type::nonNull(Type::int()),
            ],
            'type' => [
                'name' => 'type',
                'type' =>  Type::nonNull(Type::int()),
            ],
        ];
    }

    public function resolve($root, $args)
    {

        $token = request()->header('x-api-token');
        $user = User::where('api_token', hash('sha256', $token))
            ->first();

        $transaction = new Transaction();
        $transaction->fill($args);
        $transaction->user_id = $user->id;
        $transaction->save();

        return $transaction;
    }
}
