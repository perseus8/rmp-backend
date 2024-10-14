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
        Schema::create('transaction_fees', function (Blueprint $table) {
            $table->id();
            // 150
            $table->double('transport_17m3_presis_pro_150')->nullable(true);
            $table->double('transport_17m3_belade_150')->nullable(true);
            $table->double('transport_27m3_presis_pro_150')->nullable(true);
            $table->double('transport_27m3_belade_150')->nullable(true);
            $table->double('transport_47m3_presis_pro_150')->nullable(true);
            $table->double('transport_47m3_belade_150')->nullable(true);
            $table->double('transport_95m3_presis_pro_150')->nullable(true);
            $table->double('transport_95m3_blade_150')->nullable(true);
            $table->double('transport_140m3_presis_pro_150')->nullable(true);
            $table->double('transport_140m3_blade_150')->nullable(true);
            // 151
            $table->double('transport_17m3_presis_pro_151')->nullable(true);
            $table->double('transport_17m3_belade_151')->nullable(true);
            $table->double('transport_27m3_presis_pro_151')->nullable(true);
            $table->double('transport_27m3_belade_151')->nullable(true);
            $table->double('transport_47m3_presis_pro_151')->nullable(true);
            $table->double('transport_47m3_belade_151')->nullable(true);
            $table->double('transport_95m3_presis_pro_151')->nullable(true);
            $table->double('transport_95m3_blade_151')->nullable(true);
            $table->double('transport_95m3_140_presis_pro_151')->nullable(true);
            $table->double('transport_95m3_140_blade_151')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_fees');
    }
};
