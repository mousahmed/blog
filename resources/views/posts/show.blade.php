@extends('layouts.app')

@section('title')
    <title>single Post: {{$post->name}}</title>
@endsection

@section('content')
    <h1 class="text-center my-5">{{$post->name}}</h1>
    <div class="justify-content-center">
        <a href="{{route('posts.edit', $post->id)}}" class="btn btn-info float-left">Edit</a>
        <button type="button" class="btn btn-danger btn" data-toggle="modal" data-target="#deleteModal">Delete
        </button>
        <form action="{{route('posts.destroy',$post->id)}}" method="post" >
            @csrf
            @method('delete')
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                 aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Delete Post</h5>
                            <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are sure you want to delete this Post?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                            <button type="submit" class="btn btn-danger">Delete</button>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    
@endsection
