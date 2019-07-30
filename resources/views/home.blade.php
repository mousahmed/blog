@extends('layouts.app')
@section('title')
    <title>CMS - Home</title>
@endsection
@section('content')

        @include('partials.sessions')
        <div class="card">
            <div class="card-header">Home</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                Welcome to CMS Website
            </div>
        </div>

@endsection
