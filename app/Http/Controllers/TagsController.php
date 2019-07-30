<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tags\CreateTagRequest;
use App\Http\Requests\Tags\UpdateTagRequest;
use Illuminate\Http\Request;
use App\Tag;
use Illuminate\Support\Facades\Session;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Tag $tags)
    {
        //
        return view('tags.index')->with('tags', $tags->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tags.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTagRequest $request)
    {
        //
        Tag::create($request->all());
        Session::flash('success', 'The tag has been created');
        return redirect(route('tags.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
        return view('tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //

        return view('tags.edit', compact('tag'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        //

        $tag->update($request->all());
        Session::flash('success', 'The tag has been updated');
        return redirect(route('tags.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        //
        if ($tag->posts()->count() > 0) {
            Session::flash('error', 'This tag can\'t be deleted because it has posts ');
            return redirect()->back();
        } else {
            $tag->delete();
            Session::flash('deleted', 'The tag has been deleted');
            return redirect(route('tags.index'));
        }
    }
}
