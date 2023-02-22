<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = 'departamento';
    protected $primaryKey = 'id_departamento';
    protected $fillable = ['nome_funcionario', 'departamento', 'id_usuario'];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function scopeNome($query, $nome)
    {
        if (!empty($nome)) {
            return $query->where('nome_funcionario', 'like', '%' . $nome . '%');
        }
    }

    public function scopeDepartamento($query, $departamento)
    {
        if (!empty($departamento)) {
            return $query->where('departamento', $departamento);
        }
    }
}
