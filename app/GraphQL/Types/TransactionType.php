<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\Transaction;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class TransactionType extends GraphQLType
{
    protected array $attributes = [
        'name' => 'Transaction',
        'description' => 'A Transaction',
        'model' => Transaction::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Id of transaction',
            ],
            'type' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Debit or Credit',
            ],
            'amount' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Amount of transaction',
            ],
            'user_id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Just user_id',
            ],
            'user' => [
                'type' => GraphQL::type('User'),
                'description' => 'Related user for transaction',
            ],
        ];
    }
}
