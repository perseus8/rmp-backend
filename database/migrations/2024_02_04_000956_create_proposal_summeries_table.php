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
        Schema::create('proposal_summeries', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('proposal_id');
            // Integer fields
            $table->double('jarmu_szukseglet', 10, 2);
            $table->double('munkaero_szukseglet', 10, 2);
            $table->double('tavolsag', 10, 2);
            $table->double('terfogat', 10, 2);
            $table->double('alacsony_ar', 10, 2);
            $table->double('utvonal_ar', 10, 2);
            $table->double('stop_ar', 10, 2);
            $table->double('nincs_zone_ar', 10, 2);
            $table->double('bonstasi_ar', 10, 2);
            $table->double('telepitesi_ar', 10, 2);
            $table->double('csomagolasi_ar', 10, 2);
            $table->double('buborekfolio_ar', 10, 2);
            $table->double('nehez_rakomany_ar', 10, 2);
            $table->double('butoremelo_ar', 10, 2);
            $table->double('kulso_lift_ar', 10, 2);
            $table->double('bolti_ar', 10, 2);
            $table->double('szemelyzeti_ar', 10, 2);
            $table->double('konyhaszerelo_ar', 10, 2);
            $table->double('villanyszerelo_ar', 10, 2);
            $table->double('teljes_ar', 10, 2);
            $table->double('kedvezmeny', 10, 2);
            $table->double('osszesen', 10, 2);

            // String field
            $table->text('megjegyes')->nullable();

            // Boolean fields
            $table->boolean('tavolsag_checked');
            $table->boolean('terfogat_checked');
            $table->boolean('alacsony_ar_checked');
            $table->boolean('utvonal_ar_checked');
            $table->boolean('stop_ar_checked');
            $table->boolean('nincs_zone_ar_checked');
            $table->boolean('bonstasi_ar_checked');
            $table->boolean('telepitesi_ar_checked');
            $table->boolean('csomagolasi_ar_checked');
            $table->boolean('buborekfolio_ar_checked');
            $table->boolean('nehez_rakomany_ar_checked');
            $table->boolean('butoremelo_ar_checked');
            $table->boolean('kulso_lift_ar_checked');
            $table->boolean('bolti_ar_checked');
            $table->boolean('szemelyzeti_ar_checked');
            $table->boolean('konyhaszerelo_ar_checked');
            $table->boolean('villanyszerelo_ar_checked');
            $table->boolean('teljes_ar_checked');
            $table->boolean('kedvezmeny_checked');
            $table->boolean('osszesen_checked');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposal_summeries');
    }
};
