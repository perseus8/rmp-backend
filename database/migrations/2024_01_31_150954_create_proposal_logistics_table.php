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
        Schema::create('proposal_logistics', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('proposal_id');
            $table->integer('tarolasi_napok_szama')->nullable();
            $table->integer('butorlift')->nullable();
            $table->integer('kulso_lift_kezelovel')->nullable();
            $table->integer('munkaero')->nullable();
            $table->integer('villanyszerelo')->nullable();
            $table->integer('biztositas')->nullable();
            $table->string('plusz_szolgaltatas')->nullable();
            $table->decimal('plusz_szolgaltatas_cost', 10, 2)->nullable();
            $table->string('plusz_szolgaltatas_date')->nullable();
            $table->string('megjegyzés')->nullable();
            $table->integer('pkw')->nullable();
            $table->integer('hanger')->nullable();
            $table->integer('transport_17')->nullable();
            $table->integer('transport_27')->nullable();
            $table->integer('transport_47')->nullable();
            $table->integer('transport_95')->nullable();
            $table->integer('transport_140')->nullable();
            $table->integer('pkw_extra')->nullable();
            $table->integer('hanger_extra')->nullable();
            $table->integer('transport_17_extra')->nullable();
            $table->integer('transport_27_extra')->nullable();
            $table->integer('transport_47_extra')->nullable();
            $table->integer('transport_95_extra')->nullable();
            $table->integer('transport_140_extra')->nullable();
            $table->decimal('total', 10, 2)->nullable();
            $table->decimal('fahrzeug', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposal_logistics');
    }
};
