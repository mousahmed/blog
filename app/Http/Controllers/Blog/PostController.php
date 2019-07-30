<?php

namespace App\Http\Controllers\Blog;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    //
    public function show(Post $post){
        return view('blog.show',compact('post'));
    }
    public function tag(Tag $tag)
    {

        return view('blog.category')->with([
            'posts' => $tag->posts()->searched()->simplePaginate(6),
            'categories' => Category::all(),
            'tags' => Tag::all(),
            'category' => $tag

        ]);
    }
    public function category(Category $category)
    {

        return view('blog.category')->with([
            'posts' => $category->posts()->searched()->simplePaginate(6),
            'categories' => Category::all(),
            'tags' => Tag::all(),
            'category' => $category

        ]);
    }
}
