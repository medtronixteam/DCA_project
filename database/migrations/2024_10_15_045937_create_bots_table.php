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
        Schema::create('bots', function (Blueprint $table) {
            $table->id();
            $table->string('bot_name')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('bot_uid')->nullable();
            $table->double('base_order')->default(0);
            $table->string('market_type',20)->nullable();
            $table->string('strategy',20)->nullable();
            $table->string('bot_type')->nullable();
            $table->string('deal_start_condition')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bots');
    }
};
