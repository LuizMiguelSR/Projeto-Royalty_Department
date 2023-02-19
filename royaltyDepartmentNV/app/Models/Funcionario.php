<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $table = 'funcionario';
    protected $primaryKey = 'id_funcionario';

    // Relacionamento com a tabela users
    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}




