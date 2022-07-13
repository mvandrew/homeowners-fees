<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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

            $table->string('name', 255)
                ->index()
                ->comment('Имя пользователя.');

            $table->string('email', 255)
                ->unique()
                ->comment('E-Mail пользователя, он же - логин.');

            $table->timestamp('email_verified_at')
                ->nullable()
                ->comment('Дата подтверждения адреса E-Mail.');

            $table->string('password')
                ->comment('Хэш пароля.');

            $table->boolean('is_admin')
                ->default(false)
                ->comment('Признак администратора.');

            $table->rememberToken();

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
};
