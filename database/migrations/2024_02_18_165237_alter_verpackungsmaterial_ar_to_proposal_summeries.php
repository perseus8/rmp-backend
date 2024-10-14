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
        Schema::table('proposal_summeries', function (Blueprint $table) {
            $table->double('verpackungsmaterial_ar', 10, 2)->default(0);
            $table->boolean('verpackungsmaterial_ar_checked')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('proposal_summeries', function (Blueprint $table) {
            //
        });
    }
};
