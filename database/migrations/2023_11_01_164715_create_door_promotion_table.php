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
        Schema::create('door_promotion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('door_id');
            $table->unsignedBigInteger('promotion_id');
            $table->timestamps();

            $table->foreign('door_id')->references('id')->on('doors')->onDelete('cascade');
            $table->foreign('promotion_id')->references('id')->on('promotions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('door_promotion');
    }
};
