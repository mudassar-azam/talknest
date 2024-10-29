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
        Schema::create('nest_settings', function (Blueprint $table) {
            $table->id();
            $table->string('nest_privacy');
            $table->string('activity_feed_privacy');
            $table->string('photo_privacy');
            $table->string('nest_message_privacy');
            $table->string('invitation_privacy');
            $table->unsignedBigInteger('nest_id');
            $table->foreign('nest_id')->references('id')->on('nests')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_settings');
    }
};
