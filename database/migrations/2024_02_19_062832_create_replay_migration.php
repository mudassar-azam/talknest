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
        Schema::create('comment_replays', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blog_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('comment_id');
            $table->text('replay');
            $table->timestamps();
            $table->foreign('blog_id')->references('id')->on('blogs')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */

     public function down(): void
     {
         Schema::dropIfExists('comment_replays');
     }
};
