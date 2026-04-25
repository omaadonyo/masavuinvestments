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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('Homepage');
            // Sections (JSON)
            $table->json('hero')->nullable();
            $table->json('features')->nullable();
            $table->json('projects')->nullable();
            $table->json('faqs')->nullable();
            $table->json('stats')->nullable();
            $table->json('steps')->nullable();
            $table->json('contact')->nullable();
            $table->json('footer')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
