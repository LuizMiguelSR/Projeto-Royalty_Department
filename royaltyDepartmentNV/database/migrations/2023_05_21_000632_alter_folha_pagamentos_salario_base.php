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
            $table->double('salario_base', 10, 2)->after('data_folha');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('folha_pagamentos', function (Blueprint $table) {
            $table->dropColumn('salario_base', 10, 2);
        });
    }
};
