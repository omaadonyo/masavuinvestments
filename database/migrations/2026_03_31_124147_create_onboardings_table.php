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
        Schema::create('onboardings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->string('full_name');
            $table->timestamp('date_of_birth')->nullable();
            $table->timestamp('date_of_joining')->nullable();
            $table->string('place_of_residence');
            $table->string('phone_number');
            $table->string('email_address');
            $table->string('national_id_passort_number');
            $table->string('source_of_income');
            $table->string('highest_level_of_education');
            $table->string('profession');
            $table->string('next_of_kin_name');
            $table->string('relationship_next_of_kin');
            $table->string('contacts_next_of_kin');
            $table->string('active_bank_account_name');
            $table->string('active_bank_account_number');
            $table->string('national_id_photo');
            $table->string('current_photo');
            $table->integer('initial_investment');
            $table->string('agree_tos');
            $table->enum('status', ['pending', 'approved', 'review', 'rejected'])->default('pending');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('onboardings');
    }
};
