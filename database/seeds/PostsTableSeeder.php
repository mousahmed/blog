<?php

use App\Post;
use App\Tag;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tags = Tag::all();
        Post::all()->each(function ($post) use ($tags) {
            $post->tags()->sync(
                $tags->random(rand(1, 5))->pluck('id')->toArray()
            );
        });
    }
}
