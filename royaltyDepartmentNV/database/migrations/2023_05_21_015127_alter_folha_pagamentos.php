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
            $table->string('departamento_nome', 50)->after('data_folha');
            $table->string('cargo', 50)->after('data_folha');
            $table->string('nome_funcionario', 50)->after('data_folha');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('folha_pagamentos', function (Blueprint $table) {
            $table->dropColumn('departamento_nome', 50);
            $table->dropColumn('cargo', 50);
            $table->dropColumn('nome_funcionario', 50);
        });
    }
};
