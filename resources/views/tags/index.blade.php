@extends('layouts.app')
@section('title')
    <title>Tags - List</title>
@endsection
@section('content')


    <div class="justify-content-center">

        <a href="{{route('tags.create')}}" class="btn btn-success mb-2">Add tag</a>
        <div class="card card-default">

            <div class="card-header">
                Tags
            </div>
            <div class="card-body">
                @if($tags->count()> 0)
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
                        @foreach($tags as $index => $tag)
                            <tr>
                                <th scope="row">{{ $index + $tags->firstItem()}}</th>
                                <td>{{$tag->name}}</td>
                                <td>{{$tag->posts->count()}}</td>
                                <td><a href="{{route('tags.edit', $tag->id)}}"
                                       class="btn btn-info btn-sm ">Edit</a></td>
                                <!-- Button trigger modal -->
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm"
                                            onclick="handleDelete({{$tag->id}})" data-toggle="modal"
                                            data-target="#deleteModal">Delete
                                    </button>


                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                    <h3 class="text-center">No Tags Yet</h3>
                @endif


            </div>
            <div class="row justify-content-center">
                {{$tags->render()}}
            </div>
        </div>

    </div>
    <!-- Modal -->
    <form action="" method="post" id="deleteTagForm">
        @csrf
        @method('delete')
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
             aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Delete tag</h5>
                        <button type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                       Are sure you want to delete this tag?
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
            $('#deleteTagForm').attr('action', '/tags/'+id);
        }
    </script>
@endsection
