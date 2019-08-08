<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

@yield('title')




    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
    @yield('styles')
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
               Blog
            </a>
           
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
                    @auth
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav mr-auto">

                                <li class="nav-item active">
                                    <a class="nav-link" href="{{route('home')}}">Home </a>
                                </li>
                                
                            </ul>
                        @endauth
        <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('users.edit' , auth()->user()->id) }}"> Edit Profile</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>


                        </div>

                    </li>
                @endguest
            </ul>
        </div>
    </nav>
</div>

<main class="py-4">

    @auth
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">
                        @if(auth()->user()->isAdmin())
                        <li class="list-group-item"><a href="{{route('users.index')}}">Users</a></li>
                        @endif
                        <li class="list-group-item"><a href="{{route('posts.index')}}">Posts</a></li>
                        <li class="list-group-item"><a href="{{route('categories.index')}}">Categories</a></li>
                        <li class="list-group-item"><a href="{{route('tags.index')}}">Tags</a></li>
                    </ul>

                    <ul class="list-group my-4">
                        <li class="list-group-item"><a href="{{route('trashed.posts.index')}}">Trashed Posts</a></li>

                    </ul>
                </div>
                <div class="col-md-8">
                    @yield('content')
                </div>
            </div>
        </div>
    @else
        @yield('content')
    @endauth

</main>
<!-- Scripts -->
<script src="{{ asset('js/app.js')}}"></script>
<script src="{{asset('js/toastr.min.js')}}"></script>
<script>
    @if(Session::has('success'))
    toastr.success("{{session('success')}}");
    @endif

    @if(Session::has('deleted'))
    toastr.success("{{session('deleted')}}");
    @endif

    @if(Session::has('error'))
    toastr.warning("{{session('error')}}");
    @endif
</script>
@yield('scripts')
</body>
</html>
