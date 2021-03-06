<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
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
        'password',
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
    ];

    /**
     * Get threads under user
     *
     * @return HasMany
     */
    public function threads()
    {
        return $this->hasMany(Thread::class, 'created_by');
    }

    /**
     * Followers
     *
     * @return HasManyThrough
     */
    public function followers()
    {
        return $this->hasManyThrough(self::class, UserFollower::class, 'following_id','id',null,'follower_id');
    }

    /**
     * following
     *
     * @return HasManyThrough
     */
    public function following()
    {
        return $this->hasManyThrough(self::class, UserFollower::class, 'follower_id','id',null,'following_id');
    }

    /**
     * Liked threads
     *
     * @return HasMany
     */
    public function threadLikes()
    {
        return $this->hasMany(ThreadLike::class);
    }
}
