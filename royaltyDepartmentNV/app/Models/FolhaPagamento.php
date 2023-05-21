<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FolhaPagamento extends Model
{
    use HasFactory;
    protected $table = 'folha_pagamentos';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id_funcionario',
        'data_folha',
        'nome_funcionario',
        'cargo',
        'departamento_nome',
        'salario_base',
        'inss',
        'sistema_s',
        'rat',
        'fgts',
        'total'
    ];
}
