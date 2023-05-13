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
        Schema::create('holerites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_funcionario');
            $table->unsignedBigInteger('id_departamento');
            $table->date('data_holerite');
            $table->double('inss_fx1', 10, 2)->nullable();
            $table->double('inss_fx2', 10, 2)->nullable();
            $table->double('inss_fx3', 10, 2)->nullable();
            $table->double('inss_fx4', 10, 2)->nullable();
            $table->double('inss_total', 10, 2)->nullable();
            $table->double('irrf_fx1', 10, 2)->nullable();
            $table->double('irrf_fx2', 10, 2)->nullable();
            $table->double('irrf_fx3', 10, 2)->nullable();
            $table->double('irrf_fx4', 10, 2)->nullable();
            $table->double('irrf_fx5', 10, 2)->nullable();
            $table->double('irrf_total', 10, 2)->nullable();
            $table->double('salario_base', 10, 2)->nullable();
            $table->double('salario_liquido', 15, 2)->nullable();
            $table->timestamps();

            $table->foreign('id_funcionario')->references('id')->on('funcionarios')->onDelete('cascade')->onUpdate('no action');
            $table->foreign('id_departamento')->references('id')->on('departamentos')->onDelete('cascade')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('holerites');
    }
};
