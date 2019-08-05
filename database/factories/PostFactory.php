<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $image = $faker->image('C:\laragon\www\cms\storage\app\public\posts','640','480','',false);
    return [
        //
        'title' => $faker->sentence(5,8),
        'description' => $faker->paragraph(20,30),
        'content' => $faker->paragraph(50,100),
        'category_id'=> $faker->numberBetween(1,Category::count()),
        'image'=> 'posts/'.$image,
        'published_at'=> $faker->dateTime(),

    ];
});
