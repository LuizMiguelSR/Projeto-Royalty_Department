<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;
use App\Models\Departamento;
use App\Models\Endereco;

class Funcionario extends Model
{
    use HasFactory;

    protected $table = 'funcionarios';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nome_funcionario',
        'registro_geral',
        'cpf',
        'telefone',
        'numero_dependentes',
        'foto',
        'status'
    ];

    // Relacionamento com a tabela users
    public function user()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function cargo()
    {
        return $this->belongsTo(Departamento::class);
    }

    // Relacionamento com a tabela departamento
    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'id');
    }

    public function endereco()
    {
        return $this->belongsTo(Endereco::class, 'id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id');
    }
}




