<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;
use PragmaRX\Google2FALaravel\Support\Authenticator;
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'exchange',
        'password',
        'invited_by',
        'is_subscribed',
        'subscription_date',
        'google2fa_secret',
        'is_2fa_enabled',
        'username'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public static function generateUsername($name)
    {
        // Convert the name to a slug (URL-friendly string)
        $baseUsername = Str::slug($name);

        // Start with the base username
        $username = $baseUsername;

        // Check if this username already exists
        $counter = 1;
        while (User::where('username', $username)->exists()) {
            // If it exists, append a number to make it unique
            $username = $baseUsername . $counter;
            $counter++;
        }

        return $username;
    }
}
