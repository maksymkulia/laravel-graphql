<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * Default password for User
     *
     * @var string
     */
    protected string $defaulPass = 'password';

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected string $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt($this->defaulPass),
            'api_token' => null,
            'api_token_expiration' => null,
            'role' => User::USER_ROLE,
        ];
    }
}
