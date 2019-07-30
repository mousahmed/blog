@extends('layouts.app')

@section('title')
    <title>Create a Post</title>
@endsection
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.2/flatpickr.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet"/>
@endsection
@section('content')
    <div class="justify-content-center">
        <div class="card card-default">
            <div class="card-header">Create new Posts</div>
            <div class="card-body">
                @include('partials.errors')
                <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <input placeholder="Title" type="text" name="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <textarea name="description" placeholder='Description' class="form-control" cols="10" rows="2"
                                  required></textarea>
                    </div>
                    <div class="form-group">
                        <input id="content" type="hidden" name="content">
                        <trix-editor input="content"></trix-editor>
                    </div>
                    @if($categories->count() > 0)
                        <div class="form-group">
                            <select name="category_id" class="form-control">
                                <option selected>Choose Category</option>
                                @foreach($categories as $category)
                                    <option value={{$category->id}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    @if($tags->count() > 0)
                        <div class="form-group">

                            <select name="tags[]" id="tags" class="form-control tags-selector"
                                    multiple="multiple">

                                @foreach($tags as $tag)
                                    <option value={{$tag->id}}>{{$tag->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    <div class="form-group">
                        <input placeholder="Published At" id="published_at" type="text" name="published_at"
                               class="form-control" required>
                    </div>

                    <div class="form-group">
                        <input type="file" name="image" class="form-control-file" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Create Post</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.2/flatpickr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
    <script>
        flatpickr('#published_at', {
            enableTime: true,
            enableSeconds: true

        });
        $(document).ready(function () {
            $('.tags-selector').select2({
                placeholder: "   Choose Tags"
            });
        }).wrap("<div class='ml-3'></div>");
    </script>
@endsection