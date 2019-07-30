<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //

    public function index(Post $posts, Category $categories, Tag $tags)
    {

        return view('welcome')->with([
            'posts' => $posts->searched()->simplePaginate(6),
            'categories' => $categories->all(),
            'tags' => $tags->all()

        ]);
    }
}
