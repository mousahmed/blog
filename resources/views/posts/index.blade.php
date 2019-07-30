@extends('layouts.app')
@section('title')
    <title>Posts - List</title>
@endsection
@section('content')


    <div class="justify-content-center">

        @include('partials.sessions')
        <a href="{{route('posts.create')}}" class="btn btn-success mb-2">Add Post</a>
        <div class="card card-default">

            <div class="card-header">
                Posts
            </div>
            <div class="card-body">
                @if($posts->count() > 0)
                    <table class="table table-hover">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Author</th>
                            <th scope="col">Category</th>
                            <th scope="col">Tags</th>
                            <th scope="col"></th>
                            <th scope="col"></th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $index => $post)
                            <tr>
                                <th scope="row">{{ $index + $posts->firstItem()}}</th>
                                <td><img width="50px" src="{{asset('storage/'.$post->image)}}" alt=""></td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->user->name}}</td>
                                <td>{{$post->category->name}}</td>
                                <td>
                                    @foreach($post->tags as $tag)
                                        {{$tag->name}}
                                    @endforeach
                                </td>
                                @if($post->trashed())
                                    <td>
                                        <form action="{{route('restore.posts.index', $post->id)}}" method="post">
                                            @csrf
                                            @method('put')
                                            <button type="submit" class="btn btn-info btn-sm ">Restore</button>
                                        </form>
                                    </td>
                                @else
                                    <td><a href="{{route('posts.edit', $post->id)}}"
                                           class="btn btn-info btn-sm ">Edit</a></td>
                            @endif
                            <!-- Button trigger modal -->
                                <td>
                                    <form action="{{route('posts.destroy', $post->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">{{$post->trashed()?
                                    'Delete':'Trash'}}</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <h3 class="text-center">No posts Yet</h3>
                @endif


            </div>
            <div class="row justify-content-center">
                {{$posts->render()}}
            </div>
        </div>

    </div>
    <!-- Modal -->
    <form action="" method="post" id="deletePostForm">
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
@endsection
@section('scripts')
    <script>
        function handleDelete(id) {
            $('#deletePostForm').attr('action', '/posts/' + id);
        }
    </script>
@endsection