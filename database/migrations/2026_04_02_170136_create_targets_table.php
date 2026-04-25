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
        Schema::create('targets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->string('title')->nullable();
            $table->integer('final_target')->default(0);
            $table->integer('target_scores')->default(0);
            $table->integer('target_balance')->default(0);
            $table->enum('status', ['ongoing', 'complete'])->default('ongoing');
            $table->timestamp('starts_on')->nullable();
            $table->timestamp('ends_on')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('targets');
    }
};
