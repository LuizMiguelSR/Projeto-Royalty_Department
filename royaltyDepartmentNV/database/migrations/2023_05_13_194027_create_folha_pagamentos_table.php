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
        Schema::create('folha_pagamentos', function (Blueprint $table) {
            $table->id();
            $table->date('data_folha');
            $table->double('inss', 10, 2)->nullable();
            $table->double('sistema_s', 10, 2)->nullable();
            $table->double('rat', 10, 2)->nullable();
            $table->double('fgts', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('folha_pagamentos');
    }
};
