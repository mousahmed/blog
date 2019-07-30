<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Tag;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('verifyCategoryCount')->only(['create','store']);
    }

    public function index(Post $posts)
    {
        //
        return view('posts.index')->with('posts', $posts->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tags= Tag::all();
        $categories = Category::all();
        return view('posts.create',compact('categories','tags'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        //
        $data = $request->only(['image','title','description','content','published_at','category_id']);
        $image = $request->image->store('posts');
        $data['image'] = $image ;
        $post = Auth::user()->posts()->create($data);
        if($request->tags){
            $post->tags()->sync($request->tags);
        }
        Session::flash('success','The post has been created');
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        $tags= Tag::all();
        $categories = Category::all();
        return view('posts.edit', compact('post','categories','tags'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
        $data = $request->only(['image','title','description','content','published_at','category_id']);
        if($request->has('image')){
            $post->deleteImage();
            $image = $request->image->store('posts');
            $data['image'] = $image ;
        }
        if($request->tags){
            $post->tags()->sync($request->tags);
        }
        $post->update($data);

        Session::flash('success','The post has been updated');
        return redirect(route('posts.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::withTrashed()->whereId($id)->firstOrFail();

        if($post->trashed()){
            $post->deleteImage();
            $post->tags()->detach();
            $post->forceDelete();
            Session::flash('deleted','The post has been permanently deleted');
        }else{
            $post->delete();
            Session::flash('deleted','The post has been trashed');
        }


        return redirect(route('posts.index'));
    }

    public function trashed(){

        $trashed = Post::onlyTrashed()->paginate(10);
        return view('posts.index')->withPosts($trashed);
    }

    public function restorePost($id){

        $post = Post::withTrashed()->find($id);
        $post->restore();
        Session::flash('success','The post has been restored');
        return redirect(route('posts.index'));

    }
}
