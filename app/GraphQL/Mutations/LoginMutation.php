<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\User;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Rebing\GraphQL\Support\Mutation;
use Illuminate\Database\Eloquent\Model;

class LoginMutation extends Mutation
{
    /**
     * Default Response
     *
     * @var array
     */
    protected array $loginResponse = [
        'status' => false,
        'token' => null,
        'error' => 'Wrong email or password'
    ];

    protected array $attributes = [
        'name' => 'loginUser'
    ];

    public function type(): Type
    {
        return GraphQL::type('LoginResponse');
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
        if (!isset($args['form']['email']) || !isset($args['form']['password'])) {
            $this->loginResponse['error'] = 'Credentials missing';

            return $this->loginResponse;
        }

        $user = User::firstWhere('email', $args['form']['email']);

        if(Hash::check($args['form']['password'], $user->password)) {

            $token = Str::random(80);
            $user->api_token = $token;
            $user->touch();
            $user->save();

            $this->loginResponse['status'] = true;
            $this->loginResponse['token'] = $token;
            $this->loginResponse['error'] = null;

            return $this->loginResponse;
        }

        return $this->loginResponse;

    }
}
