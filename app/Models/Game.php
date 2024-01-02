<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $primaryKey = 'game_id';
    protected $table = 'games';
    protected $fillable = ['game_id', 'title', 'deskripsi', 'price', 'publisher_id','release_date','platform', 'image'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'publisher_id');
    }
}
