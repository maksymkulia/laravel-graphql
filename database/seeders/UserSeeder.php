<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds for regular users.
     *
     * @return void
     */
    public function run(): void
    {
        User::factory(10)->create();
    }
}
