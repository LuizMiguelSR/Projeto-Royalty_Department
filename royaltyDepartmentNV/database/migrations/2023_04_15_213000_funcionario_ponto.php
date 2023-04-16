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
        Schema::create('funcionario_ponto', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_funcionario')->nullable();
            $table->date('diames')->nullable();
            $table->time('entrada')->nullable();
            $table->time('almoco_sai')->nullable();
            $table->time('almoco_che')->nullable();
            $table->time('saida')->nullable();
            $table->time('horas_trabalhadas')->nullable();
            $table->timestamps();

            $table->foreign('id_funcionario')->references('id')->on('funcionario')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funcionario_ponto');
    }
};
