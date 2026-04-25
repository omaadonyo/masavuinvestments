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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->uuid('txn_id')->unique();
            $table->string('txn_reference')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->string('txn_type');
            $table->integer('total_deposit')->nullable();
            $table->integer('amount');
            $table->integer('management_fees');
            $table->integer('return_fee')->default(0);
            $table->enum('status', ['pending', 'approved', 'review', 'rejected'])->default('pending');
            $table->string('notes')->nullable();
            $table->string('payment_proof')->nullable();
            $table->foreignId('approved_by')->nullable();
            $table->foreignId('reviewed_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
