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
        Schema::create('proposal_packing_materials', function (Blueprint $table) {
            $table->id();
            $table->string('proposal_id');
            $table->bigInteger('packing_material_id');
            $table->string('verpackungsmaterial');
            $table->double('gegenstand');
            $table->double('ar');
            $table->double('zwischensum');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposal_packing_materials');
    }
};
