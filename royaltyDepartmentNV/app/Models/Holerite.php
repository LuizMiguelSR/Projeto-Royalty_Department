<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Holerite extends Model
{
    use HasFactory;

    protected $table = 'holerites';

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
}

