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

        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            //logistic days
            $table->integer('tarolasi_napok_szama')->default(14);


            $table->double('transportpreis_euro_km')->nullable(true);
            $table->double('beladen_euro_m3')->nullable(true);
            $table->double('entladen_euro_m3')->nullable(true);
            $table->double('auspacken_euro_m3')->nullable(true);
            $table->double('de_und_remontage_euro_std')->nullable(true);
            $table->double('kuchenmonteur_euro_std')->nullable(true);
            $table->double('elektriker_euro_std')->nullable(true);
            $table->double('zuschlag_geschoss')->nullable(true);
            $table->double('zuschlag_abtrageweg_uber')->nullable(true);
            $table->double('zuschlag_schwergut')->nullable(true);
            $table->double('mobel_stecklift')->nullable(true);
            $table->double('aubenaufzug_inkl_bediener')->nullable(true);
            $table->double('halteverbotszone')->nullable(true);
            $table->double('be_und_entladestelle')->nullable(true);
            $table->double('entsorgung_handling')->nullable(true);
            $table->double('lagerentgelt_je')->nullable(true);
            $table->double('pkw_szemely_auto')->nullable(true);
            $table->double('lkw_35_to_17m3')->nullable(true);
            $table->double('lkw_75_to_27m3')->nullable(true);
            $table->double('lkw_12_to_47m3')->nullable(true);
            $table->double('lkw_18_to_95m')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fees');
    }
};
