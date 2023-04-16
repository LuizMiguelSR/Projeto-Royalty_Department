<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuncionarioPonto extends Model
{
    use HasFactory;

    protected $table = 'funcionario_ponto';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id_funcionario',
        'diames',
        'entrada',
        'almoco_sai',
        'almoco_che',
        'saida',
        'horas_trabalhadas'
    ];
}
