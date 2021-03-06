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
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');//untuk relasi dengan category
            $table->foreignId('user_id'); //untuk relasi dengan user
            $table->string('title');
            $table->string('image')->nullable();
            $table->string('slug')->unique(); //slug yang akan digunakan dalam route
            $table->text('excerpt');
            $table->text('body');
            $table->timestamp('publish_at')->nullable(); //tipedata time stamp untuk colums ini
            $table->timestamps(); //method untuk mengisikan timestap setiap data
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
