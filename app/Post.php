<?php

namespace App;

use App\Scope\DeleteAdminScope as ScopeDeleteAdminScope;
use App\Scope\LatestScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillabe=['title', 'content', 'user_id'];
    protected $guarded = array();

    use SoftDeletes;

    public function getCreatedAtAttribute($date)
    {
        Carbon::setLocale('pt-BR');
        return Carbon::parse($date)->format('d M, Y');
    }

    public function comments(){
        return $this->hasMany('App\Comment', 'post_id')->latest();
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function scopeMostCommented(Builder $query){
        return $query->withCount('comments')->orderby('comments_count', 'desc');
    }

    public static function boot(){
        static::addGlobalScope(new ScopeDeleteAdminScope);

        parent::boot();

        static::deleting(function (Post $post){
            $post->comments()->delete();
        });

        static::restoring(function (Post $post){
            $post->comments()->restore();
        });
    }
}
