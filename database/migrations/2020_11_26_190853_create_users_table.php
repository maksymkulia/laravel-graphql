<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Full name of user');
            $table->string('email')->unique()->comment('Email of user');
            $table->string('password')->comment('Password of user bcrypt');
            $table->string('api_token', 200)->nullable()->default(null)->comment('API token');
            $table->timestamp('api_token_expiration')->nullable()->default(null)->comment('When API token expires');
            $table->tinyInteger('role')->default(User::USER_ROLE)->comment('By default USER');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
}
