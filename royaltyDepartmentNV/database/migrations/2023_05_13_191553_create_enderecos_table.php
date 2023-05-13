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
        Schema::create('enderecos', function (Blueprint $table) {
            $table->id();
            $table->string('rua', 50)->nullable();
            $table->unsignedSmallInteger('numero')->nullable();
            $table->unsignedInteger('cep')->nullable();
            $table->string('complemento', 50)->nullable();
            $table->string('cidade', 50)->nullable();
            $table->string('bairro', 50)->nullable();
            $table->string('estado', 50)->nullable();
            $table->string('pais', 50)->nullable();
            $table->enum('status',['ativado','desativado'])->default('ativado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enderecos');
    }
};
