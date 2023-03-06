<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Usuario extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'email',
        'role',
        'senha'
    ];

    protected $hidden = [
        'senha',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function funcionarios()
    {
        return $this->hasMany(Funcionario::class, 'id_usuario');
    }
}
