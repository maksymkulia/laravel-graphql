<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\User;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class LoginMutation extends Mutation
{
    protected array $attributes = [
        'name' => 'loginUser'
    ];

    public function type(): Type
    {
        return GraphQL::type('User');
    }

    public function args(): array
    {
        return [
            'form' => [
                'type' => GraphQL::type('LoginInput')
            ]
        ];
    }

    public function resolve($root, $args)
    {
        // $user = new User();
        // $user->fill($args);
        // $user->save();

        return ['status' => 'ok'];
    }
}
