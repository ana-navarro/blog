<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Post;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {
    static $password;

    return [
        'title' => Str::random(5),
        'content' => Str::random(10),
        'created_at' => $faker->dateTimeBetween('-3 months'),
    ];
});
