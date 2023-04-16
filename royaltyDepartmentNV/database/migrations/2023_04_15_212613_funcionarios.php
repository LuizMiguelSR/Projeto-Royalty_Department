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
        Schema::create('funcionario', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_departamento')->nullable();
            $table->unsignedBigInteger('id_endereco')->nullable();
            $table->unsignedBigInteger('id_usuario')->nullable();
            $table->string('nome_funcionario', 50)->nullable();
            $table->string('registro_geral', 15)->nullable();
            $table->string('cpf', 14)->nullable();
            $table->string('telefone', 15)->nullable();
            $table->tinyInteger('numero_dependentes')->nullable();
            $table->string('foto', 100)->nullable();
            $table->timestamps();

            $table->foreign('id_departamento')->references('id')->on('departamento')->onDelete('cascade')->onUpdate('no action');
            $table->foreign('id_endereco')->references('id')->on('endereco')->onDelete('cascade')->onUpdate('no action');
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('cascade')->onUpdate('no action');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funcionario');
    }
};
