<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    protected $table = 'comments';

    public function post(){
        return $this->belongsTo('App\Post', 'post_id');
    }
    public function scopeLatestComents(Builder $query){
        return $query->latest();
    }
    public static function boot(){
        parent::boot();
    }
}
