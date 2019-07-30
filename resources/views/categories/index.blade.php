@extends('layouts.app')
@section('title')
    <title>Categories - List</title>
@endsection
@section('content')


    <div class="justify-content-center">

        @include('partials.sessions')
        <a href="{{route('categories.create')}}" class="btn btn-success mb-2">Add Category</a>
        <div class="card card-default">

            <div class="card-header">
                Categories
            </div>
            <div class="card-body">
                @if($categories->count()> 0)
                    <table class="table table-hover">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Posts Count</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $index => $category)
                            <tr>
                                <th scope="row">{{ $index + $categories->firstItem()}}</th>
                                <td>{{$category->name}}</td>
                                <td>{{$category->posts->count()}}</td>
                                <td><a href="{{route('categories.edit', $category->id)}}"
                                       class="btn btn-info btn-sm ">Edit</a></td>
                                <!-- Button trigger modal -->
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm"
                                            onclick="handleDelete({{$category->id}})" data-toggle="modal"
                                            data-target="#deleteModal">Delete
                                    </button>


                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <h3 class="text-center">No Categories Yet</h3>
                @endif


            </div>
            <div class="row justify-content-center">
                {{$categories->render()}}
            </div>
        </div>

    </div>
    <!-- Modal -->
    <form action="" method="post" id="deleteCategoryForm">
        @csrf
        @method('delete')
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
             aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Delete Category</h5>
                        <button type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are sure you want to delete this category?
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
            $('#deleteCategoryForm').attr('action', '/categories/' + id);
        }
    </script>
@endsection