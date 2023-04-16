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
        Schema::create('folha_pagamento', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_funcionario')->nullable();
            $table->unsignedBigInteger('id_holerite')->nullable();
            $table->unsignedBigInteger('id_departamento')->nullable();
            $table->date('data_folha')->nullable();
            $table->double('inss', 10, 2)->nullable();
            $table->double('sistema_s', 10, 2)->nullable();
            $table->double('rat', 10, 2)->nullable();
            $table->double('fgts', 10, 2)->nullable();
            $table->timestamps();

            $table->foreign('id_funcionario')->references('id')->on('funcionario')->onDelete('cascade');
            $table->foreign('id_holerite')->references('id')->on('holerite')->onDelete('cascade');
            $table->foreign('id_departamento')->references('id')->on('departamento')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('folha_pagamento');
    }
};
