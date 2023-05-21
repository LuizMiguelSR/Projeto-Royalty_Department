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
        Schema::table('folha_pagamentos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_funcionario')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('folha_pagamentos', function (Blueprint $table) {
            $table->dropColumn('id_funcionario');
        });
    }
};
