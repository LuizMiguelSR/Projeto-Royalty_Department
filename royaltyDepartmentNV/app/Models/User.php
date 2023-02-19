<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Models\Funcionario;

class User extends Model implements Authenticatable
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    protected static $email = 'email';
    protected static $password = 'senha';

    public static function findByEmailAndPassword($email, $password)
    {
        $user = self::where(self::$email, $email)->first();

        if (!$user) {
            return null;
        }

        if (!password_verify($password, $user->{self::$password})) {
            return null;
        }

        return $user;
    }

    // Implementação dos métodos da interface Authenticatable

    public function getAuthIdentifierName()
    {
        return 'id_usuario';
    }

    public function getAuthIdentifier()
    {
        return $this->id_usuario;
    }

    public function getAuthPassword()
    {
        return $this->senha;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'id_usuario', 'id_funcionario');
    }
}
