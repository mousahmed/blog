@extends('layouts.app')

@section('title')
    <title>Create a Category</title>
@endsection

@section('content')

    <div class="justify-content-center">
        <div class="card card-default">
            <div class="card-header">Create new Categories</div>
            <div class="card-body">
                @include('partials.errors')
                <form action="{{route('categories.store')}}" method="post">
                    @csrf

                    <div class="form-group">
                        <input placeholder="Name" type="text" name="name" class="form-control" required>
                    </div>

                    <button class="btn btn-success">Create Category</button>
                </form>
            </div>
        </div>

    </div>
@endsection
