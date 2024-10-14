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
        Schema::create('start_locations', function (Blueprint $table) {
            $table->id();
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
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('start_locations');
    }
};
