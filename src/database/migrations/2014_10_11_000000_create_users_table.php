<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // bigint unsigned, primary key
            $table->string('name', 255);       // NOT NULL
            $table->string('email', 255)->unique();      // NOT NULL
            $table->string('password', 255);   // NOT NULL
            $table->timestamps();              // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
}
