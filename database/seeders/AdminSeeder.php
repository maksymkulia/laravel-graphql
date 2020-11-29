<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Number of seeds
     *
     * @var int
     */
    protected int $seeds = 2;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        User::factory($this->seeds)
            ->create([
                'role' => User::ADMIN_ROLE
            ]);
    }
}
