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

        Schema::create('zone_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('zone_id');
            //item_name
            $table->string('targy_neve');
            // dowel_work
            $table->boolean('dubel_arbeiten')->default(false);
            //electrician
            $table->boolean('villanyszerelo')->default(false);
            // kitchen_fitter
            $table->boolean('konyhaszerelo')->default(false);
            // Volume
            $table->string('volume')->nullable();
            //packing_time_per_person
            $table->string('csomagolasi_ido')->nullable();
            //bubble_packing_time_per_person
            $table->string('buborekcsomagolasi_ido')->nullable();
            //unpacking_time_per_person
            $table->string('kicsomagolasi_ido')->nullable();
            //disassembly_time_per_person
            $table->string('szetszerelesi_ido')->nullable();
            //assembly_time_per_person
            $table->string('osszeszerelesi_ido')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zone_items');
    }
};
