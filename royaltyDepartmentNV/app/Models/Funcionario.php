<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $table = 'funcionario';
    protected $primaryKey = 'id_funcionario';
    protected $fillable = [
        'nome_funcionario',
        'registro_geral',
        'cpf',
        'telefone',
        'numero_dependentes',
        'foto'
    ];

    // Relacionamento com a tabela users
    public function user()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    public function cargo()
    {
        return $this->belongsTo(Departamento::class);
    }

    // Relacionamento com a tabela departamento
    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'id_departamento');
    }

    public function endereco()
    {
        return $this->belongsTo(Endereco::class, 'id_endereco');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
}




