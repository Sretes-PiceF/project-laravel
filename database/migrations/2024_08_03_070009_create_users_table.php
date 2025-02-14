<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('user_id', 16)->primary()->nullable(false);
            $table->string('user_nama', 50)->nullable(false);
            $table->string('user_alamat', 50)->nullable(false);
            $table->string('user_username', 50)->nullable(false);
            $table->string('user_email', 50)->nullable(false);
            $table->char('user_notelp', 13)->nullable(false);
            $table->string('user_password', 255)->nullable(false);
            $table->enum('user_level', ['admin', 'anggota'])->nullable(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table){
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('create_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
