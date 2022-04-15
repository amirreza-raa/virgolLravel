<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile',
        'bio',
        'username',
        'email_on_follow',
        'email_on_like',
        'email_on_reply',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'profile_src'
    ];

    // public function sendEmailVerificationNotification()
    // {
    //     $this->notify(new VerifyEmail);
    // }

    public function getProfileSrcAttribute()
    {
        $profileImage = Str::beforeLast($this->profile, '?');
        return $this->profile && File::exists(public_path('/profiles/' . $profileImage))
            ?  '/profiles/' . $this->profile
            : null;
    }
}
