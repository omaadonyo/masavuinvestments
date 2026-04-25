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
        Schema::create('offboardings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->string('name');
            $table->date('date_of_exit');
            $table->enum('membership_duration', ['less_than_1year', '1_to_2.5_years', '2.5_years_and_above']);
            $table->enum('role_in_club', ['general_member', 'committee_member', 'leadership_and_management']);
            $table->string('main_reason_leaving');
            $table->text('reason_details')->nullable();
            $table->tinyInteger('overall_experience')->nullable();
            $table->text('liked_most')->nullable();
            $table->text('liked_least')->nullable();
            $table->json('satisfaction_ratings')->nullable();
            $table->text('recommended_improvements')->nullable();
            $table->text('continue_doing')->nullable();
            $table->text('stop_doing')->nullable();
            $table->enum('rejoin_future', ['yes', 'no', 'maybe'])->nullable();
            $table->enum('recommend_to_others', ['yes', 'no', 'maybe'])->nullable();
            $table->enum('status', ['pending', 'review', 'approved'])->default('pending');
            $table->integer('total_contribution')->default(0);
            $table->integer('total_contribution_withdraw_charges')->default(0);
            $table->integer('total_contribution_interest')->default(0);
            $table->text('additional_comments')->nullable();
            $table->boolean('exit_confirmation')->default(false);
            $table->boolean('cooperation_confirmation')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offboardings');
    }
};
