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
        Schema::create('contributions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('target_id')->nullable();
            $table->string('reference')->nullable();
            $table->integer('amount')->default(0);
            $table->integer('managment_fee')->default(0);
            $table->integer('return_fee')->nullable();
            $table->integer('management_fee')->default(0);
            $table->integer('total_deposit')->default(0);
            $table->integer('initial_investment')->default(0);
            $table->string('payment_proof')->nullable();
            $table->text('notes')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->foreignId('approved_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contributions');
    }
};
