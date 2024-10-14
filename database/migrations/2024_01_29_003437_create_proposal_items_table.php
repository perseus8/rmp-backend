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
        Schema::create('proposal_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('proposal_id');
            $table->bigInteger('zone_id');
            $table->bigInteger('location_id');
            $table->bigInteger('item_id');
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
            // --------------------------------------------------------------
            $table->integer('gegenstand');
            $table->integer('entladen');
            $table->boolean('demontage_checked')->default(false);
            $table->boolean('montage_checked')->default(false);
            $table->boolean('einpacken_checked')->default(false);
            $table->boolean('luftpolsterfol_checked')->default(false);
            $table->boolean('auspacken_checked')->default(false);
            $table->boolean('entsorgen_checked')->default(false);
            $table->boolean('einlagern_checked')->default(false);
            $table->boolean('schwergut_checked')->default(false);
            $table->boolean('nicht_zerlegbar_checked')->default(false);
            $table->double('capacity', 20, 2)->default(0);
            $table->double('zwischensum', 20, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposal_items');
    }
};
