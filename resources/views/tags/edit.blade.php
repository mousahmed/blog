@extends('layouts.app')

@section('title')
    <title>Update a Tag</title>
@endsection
@section('content')
    <h1 class="text-center my-3">Update Tag</h1>
    <div class="justify-content-center">

            <div class="card card-default">
                <div class="card-header">Update Tag</div>
                <div class="card-body">
                    @include('partials.errors')
                    <form action="{{route('tags.update', $tag->id)}}" method="post">
                        @csrf
                        @method('patch')


                        <div class="form-group">
                            <input placeholder="Name" type="text" name="name" value="{{$tag->name}}"
                                   class="form-control" required>
                        </div>


                        <button class="btn btn-success">Update Tag</button>
                    </form>
                </div>
            </div>
    </div>
@endsection
