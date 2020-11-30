<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\User;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType
{
    protected array $attributes = [
        'name' => 'User',
        'description' => 'A user',
        'model' => User::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Id of User',
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The name of User',
            ],
            'email' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The email of User',
            ],
            'role' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The role of User',
            ],
            'transactions' => [
                'type' => Type::listOf(GraphQL::type('Transaction')),
                'description' => 'List of transactions for User',
            ],
        ];
    }
}
