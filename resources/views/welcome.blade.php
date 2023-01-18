@extends('layouts.app')
@section('content')

<div class="jumbotron p-5 mb-4 bg-light rounded-3">
    <div class="container py-5">
        <h1 class="title_home">Team</h1>
    </div>
    <div class="container py-2">
        <h4>Login for look all team collaborators!</h4>
        <button class="btn btn-primary mb-3">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </button>

    </div>
</div>
@endsection