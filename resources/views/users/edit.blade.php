@extends('layouts.app')
@section('title')
    <title>{{$user->name}} - Profile</title>
@endsection
@section('content')

    @include('partials.sessions')
    <div class="card">
        <div class="card-header">Edit Profile</div>

        <div class="card-body">
            @include('partials.errors')
            <form action="{{route('users.update',$user->id)}}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <input class="form-control" name="name" type="text" value="{{$user->name}}" required>
                </div>

                <div class="form-group">
                    <textarea class="form-control" name="about" type="text" rows="10" cols="10" required>{{$user->about}}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Update Profile</button>
                </div>
            </form>

        </div>
    </div>

@endsection
