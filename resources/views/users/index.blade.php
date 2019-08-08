@extends('layouts.app')
@section('title')
    <title>Users - List</title>
@endsection
@section('content')


    <div class="justify-content-center">

        {{--        <a href="{{route('users.create')}}" class="btn btn-success mb-2">Add User</a>--}}
        <div class="card card-default">

            <div class="card-header">
                Users
            </div>
            <div class="card-body">
                @if($users->count() > 0)
                    <table class="table table-hover">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">role</th>
                            <th scope="col">Posts</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $index => $user)
                            <tr>
                                <th scope="row">{{ $index + $users->firstItem()}}</th>
                                <td><img height="40px" width="40px" style="border-radius: 50%" src="{{Gravatar::src($user->email)}}" alt=""></td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->role}}</td>
                                <td>{{$user->posts->count()}}</td>
                                {{--                                @if($user->trashed())--}}
                                {{--                                    <td>--}}
                                {{--                                        <form action="{{route('restore.users.index', $user->id)}}" method="user">--}}
                                {{--                                            @csrf--}}
                                {{--                                            @method('put')--}}
                                {{--                                            <button type="submit" class="btn btn-info btn-sm ">Restore</button>--}}
                                {{--                                        </form>--}}
                                {{--                                    </td>--}}
                                {{--                                @else--}}
                                <td><a href="{{route('users.edit', $user->id)}}"
                                       class="btn btn-info btn-sm ">Edit</a></td>
                            {{--                            @endif--}}
                            <!-- Button trigger modal -->
                                <td>
                                    <form action="{{route('users.destroy', $user->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            {{--                                            {{$user->trashed()?'Delete':'Trash'}}--}}
                                            Delete
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    @if(!$user->isAdmin())
                                        <form action="{{route("make.admin", $user->id)}}" method="post">
                                            @csrf
                                            @method('put')
                                            <input type="hidden" name="role" value="administrator">
                                            <button type="submit" class="btn btn-sm btn-success">Make Admin</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <h3 class="text-center">No Users Yet</h3>
                @endif


            </div>
            <div class="row justify-content-center">
                {{$users->render()}}
            </div>
        </div>

    </div>
    <!-- Modal -->
    <form action="" method="user" id="deleteuserForm">
        @csrf
        @method('delete')
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
             aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Delete user</h5>
                        <button type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are sure you want to delete this user?
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
            $('#deleteuserForm').attr('action', '/users/' + id);
        }
    </script>
@endsection
