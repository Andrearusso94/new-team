@extends('layouts.admin')

@section('content')

<div class="container py-4">
    <div class="d-flex gap-4">
        <div class="details">
            @if($collaborator->image)
            <img class="img-fluid" src="{{asset('storage/' . $collaborator->image)}}" alt="">
            @else
            <div class="placeholder p-5 bg-dark">No Image</div>
            @endif
            <h1>{{$collaborator->name}}</h1>
            <p>{{$collaborator->bio}}</p>
            <div class="category">
                <strong>Role:</strong>
                {{ $collaborator->role ? $collaborator->role->name : 'Null'}}
            </div>
        </div>
    </div>
</div>
@endsection