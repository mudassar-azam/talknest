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
        Schema::create('nests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('Discussion')->default(false);
            $table->string('photo_name')->nullable();
            $table->string('cover_photo_name')->nullable();
            $table->unsignedBigInteger('admin_id');
            $table->timestamps();

            $table->foreign('admin_id')->references('id')->on('nests')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nests');
    }
};
