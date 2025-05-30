<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'request_type',
        'message',
        'status'
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];
}
