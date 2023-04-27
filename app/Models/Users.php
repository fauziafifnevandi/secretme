<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    public function messages()
    {
        return $this->hasMany(Message::class, 'user_id');
    }

    protected $fillable = [
        'username',
        'user_account_device',
        'generate_link'
    ];
}
