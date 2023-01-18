@extends('layouts.admin')

@section('content')
<div class="container py-4">

    <div class="container py-2">
        <h3>Update: {{$collaborator->name}}</h3>
        @include('partials.errors')
        <form action="{{route('admin.collaborators.update', $collaborator->slug)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="name here" aria-describedby="nameHelpId" value="{{old('name', $collaborator->name)}}">
                <small id="nameHelpId" class="text-muted">Add collaborator name and lastname here, max 100 characters.</small>
            </div>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" placeholder="cover image here" aria-describedby="imageHelpId">
                <small id="imageHelpId" class="text-muted">Add collaborator image here</small>
            </div>
            @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="bio" class="form-label">Bio</label>
                <input type="text" name="bio" id="bio" class="form-control @error('bio') is-invalid @enderror" placeholder="bio here" aria-describedby="bioHelpId" value="{{old('bio', $collaborator->bio)}}">
                <small id="bioHelpId" class="text-muted">Add collaborator bio here, min 20 characters.</small>
            </div>
            @error('bio')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="role_id" class="form-label">Roles</label>
                <select class="form-select form-select-lg @error('role_id') 'is-invalid' @enderror" name="role_id" id="role_id">
                    <option value="">Select one</option>

                    @forelse ($roles as $role )
                    <!-- TODO fix old value -->
                    <option value="{{$role->id}}" {{ $role->id == old('role_id',  $collaborator->role ? $collaborator->role->id : '') ? 'selected' : '' }}>{{$role->name}}</option>


                    @empty
                    <option value="">Sorry, no roles in the system.</option>
                    @endforelse

                </select>
            </div>

            @error('bio')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-outline-primary my-3"><i class="fa-solid fa-arrow-up-from-bracket"></i></button>
        </form>
    </div>

</div>
@endsection