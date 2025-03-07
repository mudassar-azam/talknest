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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blog_id')->nullable(); // Make blog_id nullable
            $table->foreign('blog_id')->references('id')->on('blogs')->onDelete('cascade');

            $table->unsignedBigInteger('post_id')->nullable();;
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');

            $table->unsignedBigInteger('user_id')->nullable();;
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');


            $table->string('username')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->text('text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            //
        });
    }
};
