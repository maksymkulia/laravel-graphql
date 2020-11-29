<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class LoginResponseType extends GraphQLType
{
    protected array $attributes = [
        'name' => 'LoginResponse',
        'description' => 'Login Response Type'
    ];

    public function fields(): array
    {
        return [
            'status' => [
                'type' => Type::nonNull(Type::boolean()),
                'description' => 'Status of Response',
            ],
            'token' => [
                'type' => Type::string(),
                'description' => 'Null if error',
            ],
            'error' => [
                'type' => Type::string(),
                'description' => 'Response not null if Error',
            ],
        ];
    }
}
