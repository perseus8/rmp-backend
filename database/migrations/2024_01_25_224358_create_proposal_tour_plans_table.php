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
        Schema::create('proposal_tour_plans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('proposal_id');
            $table->string('place_id');
            // Address
            $table->string('cim');
            // location name
            $table->string('helyszin_neve')->nullable(true);
            $table->double('latitude');
            $table->double('longitute');
            $table->string('streetNumber')->nullable(true);
            $table->string('route')->nullable(true);
            $table->string('country')->nullable(true);
            $table->string('postalCode')->nullable(true);
            $table->string('locality')->nullable(true);
            // -----------------------------------
            // floor
            $table->string('emelet')->nullable(true);
            //distance
            $table->string('tavolsag')->nullable(true);
            // stop
            $table->string('megallo')->nullable(true);
            // elevator
            $table->boolean('lift')->default(false);
            // narrow stairs
            $table->boolean('szuk_lepcsohaz')->default(false);
            // public administration
            $table->boolean('kozteruleti_ugyintezes')->default(false);
            $table->string('note', 1000)->nullable(true);
            $table->double('capacity')->default(0);
            $table->double('total')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposal_tour_plans');
    }
};
