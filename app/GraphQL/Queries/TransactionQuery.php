<?php


namespace App\GraphQL\Queries;

use App\Models\Transaction;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class TransactionQuery extends Query
{
    protected $attributes = [
        'name' => 'transaction',
    ];

    public function type(): Type
    {
        return GraphQL::type('Transaction');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'user_id' => [
                'name' => 'user_id',
                'type' => Type::int()
            ],
            'type' => [
                'name' => 'type',
                'type' => Type::int()
            ],
            'amount' => [
                'name' => 'amount',
                'type' => Type::int()
            ],
        ];
    }

    public function resolve($root, $args)
    {
        return Transaction::findOrFail($args['id']);
    }
}
