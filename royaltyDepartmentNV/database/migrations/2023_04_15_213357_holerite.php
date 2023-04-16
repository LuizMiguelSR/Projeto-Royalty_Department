<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('holerite', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_funcionario')->constrained('funcionario')->onDelete('cascade');
            $table->foreignId('id_departamento')->constrained('departamento')->onDelete('cascade');
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
        });
    }

    public function down()
    {
        Schema::dropIfExists('holerite');
    }
};
