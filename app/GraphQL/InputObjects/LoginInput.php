<?php

declare(strict_types=1);

namespace App\GraphQL\InputObjects;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\InputType;

class LoginInput extends InputType
{
    /**
     * @var array|string[]
     */
    protected array $attributes = [
        'name' => 'loginInput',
        'description' => 'Login form'
    ];

    /**
     * @return array[]
     */
    public function fields(): array
    {
        return [
            'email' => [
                'name' => 'email',
                'description' => 'Email of user',
                'type' => Type::string(),
                'rules' => ['min:3', 'max:150']
            ],
            'password' => [
                'name' => 'password',
                'description' => 'Password in open format',
                'type' => Type::string(),
                'rules' => ['min:1', 'max:50']
            ]
        ];
    }
}
