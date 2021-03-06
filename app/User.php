<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;


    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function scopeWithMostPosts(Builder $query)
    {
        return $query->withCount(['posts'=> function(Builder $query){
            $query->whereBetween(static::CREATED_AT, [now()->subMonths(1), now()]);
        }])
        ->orderBy('posts_count', 'desc');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function adminlte_profile_url()
    {
        return 'profile/username';
    }

}
