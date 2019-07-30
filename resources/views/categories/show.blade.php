@extends('layouts.app')

@section('title')
    <title>single Category: {{$category->name}}</title>
@endsection

@section('content')
    <h1 class="text-center my-5">{{$category->name}}</h1>
    <div class="justify-content-center">

            <form class="" action="{{route('categories.destroy',$category->id)}}" method="post">
            <a href="{{route('categories.edit', $category->id)}}" class="btn btn-info float-left">Edit</a>
                @csrf
                @method('delete')
                <button  class="btn btn-danger float-right">Delete</button>
            </form>
        </div>


@endsection
