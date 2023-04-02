<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Models\Funcionario;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword;
use App\Notifications\ResetPasswordNotification;


class User extends Model implements Authenticatable, CanResetPasswordContract
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
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
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->id;
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
        return $this->belongsTo(Funcionario::class, 'id_usuario', 'id');
    }

    use Notifiable, CanResetPassword;

    // ...

    /**
     * Get the e-mail address where password reset links are sent.
     *
     * @return string
     */
    public function getEmailForPasswordReset()
    {
        return $this->email;
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
