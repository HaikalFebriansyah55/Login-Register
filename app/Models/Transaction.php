<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = ['game_id', 'id'];

    // Relasi dengan model Game
    public function game()
    {
        return $this->belongsTo(Game::class, 'game_id');
    }

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
