@extends('layouts.app')

@section('title')
    <title>Update a Category</title>
@endsection

@section('content')
    <h1 class="text-center my-3">Update Category</h1>
    <div class="justify-content-center">

            <div class="card card-default">
                <div class="card-header">Update Category</div>
                <div class="card-body">
                    @include('partials.errors')
                    <form action="{{route('categories.update', $category->id)}}" method="post">
                        @csrf
                        @method('patch')


                        <div class="form-group">
                            <input placeholder="Name" type="text" name="name" value="{{$category->name}}"
                                   class="form-control" required>
                        </div>


                        <button class="btn btn-success">Update Category</button>
                    </form>
                </div>
            </div>
    </div>
@endsection
