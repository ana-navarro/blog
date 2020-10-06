<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillabe=['title', 'content'];
    protected $guarded = array();

    public function getCreatedAtAttribute($date)
    {
        Carbon::setLocale('pt-BR');
        return Carbon::parse($date)->format('d M, Y');
    }

    public function comments(){
        return $this->hasMany('App\Comment', 'post_id');
    }
}
