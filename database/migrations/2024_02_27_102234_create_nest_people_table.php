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
        Schema::create('nest_people', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nest_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('invitation_status')->default(false);

            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('nest_id')->references('id')->on('nests')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nest_people');
    }
};
