<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Number of seeds
     *
     * @const
     */
    const SEEDS = 2;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        User::factory(self::SEEDS)
            ->create([
                'role' => User::ADMIN_ROLE
            ]);
    }
}
