<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\User;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Illuminate\Validation\Rule;

class CreateUserMutation extends Mutation
{
    protected array $attributes = [
        'name' => 'createUser'
    ];

    public function rules(array $args = []): array
    {
        return [
            'name' => [
                'required', 'max:100'
            ],
            'email' => [
                'required', 'email', 'unique:users,email',
            ],
            'password' => [
                'required', 'min:5', 'max:50',
            ],
            'role' => [
                'required', 'int', 'max:1'
            ],
        ];
    }

    public function type(): Type
    {
        return GraphQL::type('User');
    }

    public function args(): array
    {
        return [
            'name' => [
                'name' => 'name',
                'type' =>  Type::nonNull(Type::string()),
            ],
            'email' => [
                'name' => 'email',
                'type' =>  Type::nonNull(Type::string()),
            ],
            'password' => [
                'name' => 'password',
                'type' =>  Type::nonNull(Type::string()),
            ],
            'role' => [
                'name' => 'role',
                'type' =>  Type::nonNull(Type::int()),
            ],
        ];
    }

    public function resolve($root, $args)
    {
        $user = new User();
        $user->fill($args);
        $user->password = $args['password'];
        $user->save();

        return $user;
    }
}
