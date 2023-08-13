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
        Schema::create('service_reward', function (Blueprint $table) {
            $table->string('bonus_service');
            $table->integer('quantity_service');
            $table->integer('quantity_bonus');
            $table->foreignId('service_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('reward_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_reward');
    }
};
