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
        Schema::create('funcionario_pontos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_funcionario');
            $table->date('diames')->nullable();
            $table->time('entrada')->nullable();
            $table->time('almoco_sai')->nullable();
            $table->time('almoco_che')->nullable();
            $table->time('saida')->nullable();
            $table->time('horas_trabalhadas')->nullable();
            $table->timestamps();

            $table->foreign('id_funcionario')->references('id')->on('funcionarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funcionario_pontos');
    }
};
