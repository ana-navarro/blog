<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillabe=['title', 'content'];
    protected $guarded = array();

    public function comments(){
        return $this->hasMany('App\Comments', 'post_id');
    }
}
