<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Number of seeds
     *
     * @var int
     */
    protected int $seeds = 50;

    /**
     * Run the database seeds for regular users.
     *
     * @return void
     */
    public function run(): void
    {
        User::factory($this->seeds)
            ->create();
    }
}
