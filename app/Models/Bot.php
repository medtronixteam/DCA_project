<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Bot extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    protected $casts = [
        'deal_start_conditions' => 'array',
    ];

    // Auto-generate bot_uid on creating a new bot
    protected static function booted()
    {
        static::creating(function ($bot) {
            $bot->bot_uid = Str::uuid()->toString();
        });
    }
}

