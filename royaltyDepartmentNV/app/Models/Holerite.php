<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Departamento;
use App\Models\Funcionario;

class Holerite extends Model
{
    use HasFactory;

    protected $table = 'holerites';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_funcionario',
        'id_departamento',
        'data_holerite',
        'inss_fx1',
        'inss_fx2',
        'inss_fx3',
        'inss_fx4',
        'inss_total',
        'irrf_fx1',
        'irrf_fx2',
        'irrf_fx3',
        'irrf_fx4',
        'irrf_fx5',
        'irrf_total',
        'salario_base',
        'salario_liquido'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public static function getByUserMonthYear($userId, $month, $year)
    {
        return self::where('id', $userId)
                   ->where('mes', $month)
                   ->where('ano', $year)
                   ->get();
    }

    // Relacionamento com a tabela departamento
    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'id');
    }

    // Relacionamento com a tabela funcionários
    public function funcionarios()
    {
        return $this->belongsTo(Funcionario::class, 'id');
    }
}

