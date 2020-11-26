<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Number of seeds
     *
     * @const
     */
    const SEEDS = 500;

    /**
     * Run the database seeds for regular users.
     *
     * @return void
     */
    public function run(): void
    {
        User::factory(self::SEEDS)
            ->create();
    }
}
