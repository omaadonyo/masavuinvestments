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
        Schema::create('annual_returns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('approved_by')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->string('year')->nullable();
            $table->integer('amount')->default(0);
            $table->text('notes')->nullable();
            $table->enum('status', ['approved', 'cancelled', 'pending'])->default('pending');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annual_returns');
    }
};
