<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;
    protected $primaryKey = 'publisher_id';
    protected $table = 'publishers';
    protected $fillable = ['publisher_id', 'publisher_name', 'address', 'contact'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
