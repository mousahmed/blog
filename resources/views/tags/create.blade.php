@extends('layouts.app')

@section('title')
    <title>Create a Tag</title>
@endsection

@section('content')
    @if(Session::has('error'))
        <div class="alert alert-danger">{{session('error')}}</div>
    @endif
    <div class="justify-content-center">
        <div class="card card-default">
            <div class="card-header">Create new Tags</div>
            <div class="card-body">
                @include('partials.errors')
                <form action="{{route('tags.store')}}" method="post">
                    @csrf

                    <div class="form-group">
                        <input placeholder="Name" type="text" name="name" class="form-control" required>
                    </div>

                    <button class="btn btn-success">Create Tag</button>
                </form>
            </div>
        </div>

    </div>
@endsection
