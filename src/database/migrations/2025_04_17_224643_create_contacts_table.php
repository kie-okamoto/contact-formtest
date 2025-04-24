<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id(); // bigint unsigned, PK
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->tinyInteger('gender')->comment('1:男性 2:女性 3:その他');
            $table->string('email', 255);
            $table->string('tel', 255);
            $table->string('address', 255);
            $table->string('building', 255)->nullable(); // ← NULL許可
            $table->text('detail');
            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
