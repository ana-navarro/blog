<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scope\LatestScope;

class Comment extends Model
{
    use SoftDeletes;

    protected $table = 'comments';

    public function post(){
        return $this->belongsTo('App\Post', 'post_id');
    }
    public static function boot(){
        parent::boot();

        static::addGlobalScope(new LatestScope);
    }
}
