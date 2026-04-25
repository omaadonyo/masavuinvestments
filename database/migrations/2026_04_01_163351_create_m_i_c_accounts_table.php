<?php

use App\Models\MICAccount;
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
        Schema::create('m_i_c_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->integer('total_contributions')->default(0);
            $table->integer('managment_fees')->default(0);
            $table->integer('total_withdraw')->default(0);
            $table->integer('withdraw_charges')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        MICAccount::create([
            'user_id' => 0,
            'total_contributions' => 0,
            'managment_fees' => 0,
            'total_withdraw' => 0,
            'withdraw_charges' => 0,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_i_c_accounts');
    }
};
