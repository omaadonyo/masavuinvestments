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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->integer('member_account')->default(0);
            $table->integer('member_number')->default(0);
            $table->timestamp('date_of_birth')->nullable();
            $table->timestamp('date_of_joining')->nullable();
            $table->string('place_of_residence')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email_address')->nullable();
            $table->string('national_id_passort_number')->nullable();
            $table->string('source_of_income')->nullable();
            $table->string('highest_level_of_education')->nullable();
            $table->string('profession')->nullable();
            $table->string('next_of_kin_name')->nullable();
            $table->string('relationship_next_of_kin')->nullable();
            $table->string('contacts_next_of_kin')->nullable();
            $table->string('active_bank_account_name')->nullable();
            $table->string('active_bank_account_number')->nullable();
            $table->string('national_id_photo')->nullable();
            $table->string('current_photo')->nullable();
            $table->string('agree_tos')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
