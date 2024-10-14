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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            // customer number
            $table->string('ugyfelszam')->nullable();
            // first name
            $table->string('keresztnev');
            // last name
            $table->string('vezeteknev');
            // customer address
            $table->string('cim');
            // customer mobile
            $table->string('telefonszam');
            $table->string('email');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
