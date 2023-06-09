<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'message_id');
    }
    
    public function user()
    {
        return $this->belongsTo(Users::class);
    }
}
