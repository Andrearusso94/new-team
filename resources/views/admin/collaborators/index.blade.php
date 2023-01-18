@extends('layouts.admin')

@section('content')
<div class="heading d-flex justify-content-between align-items-center pt-4">
    <h2>Projects</h2>
    <div><a href="{{route('admin.collaborators.create')}}" class="btn btn-outline-light"><i class="fas fa-plus    "></i></a></div>
</div>

@include('partials.message')

<div class="table-responsive pt-4">
    <table class="table table-striped table-primary align-middle table-hover table-borderless">
        <thead class="table-dark">
            <tr>
                <th>Id</th>
                <th>Image</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Role</th>
                <th>Bio</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @forelse($collaborators as $collaborator)
            <tr class="table-light">
                <td scope="row">{{$collaborator->id}}</td>
                <td>
                    @if($collaborator->image)
                    <img width="140" class="img-fluid" src="{{asset('storage/' . $collaborator->cover_image)}}" alt="">
                    @else
                    <div class="placeholder p-5 bg-dark d-flex align-items-center justify-content-center" style="width:140px">No Image</div>
                    @endif
                </td>
                <td>{{$collaborator->name}}</td>
                <td>{{$collaborator->slug}}</td>
                <td>{{ $collaborator->role ? $collaborator->role->name : ' No role match'}}</td>
                <td>{{$collaborator->bio}}</td>

                <td class="d-flex flex-column gap-2">
                    <a href="{{route('admin.collaborators.show', $collaborator->slug)}}" class="btn btn-outline-primary view" role="button">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{route('admin.collaborators.edit', $collaborator->slug)}}" class="btn btn-outline-secondary edit">
                        <i class="fas fa-pencil fa-sm fa-fw"></i>
                    </a>
                    <a href="" class="btn btn-outline-danger delete" data-bs-toggle="modal" data-bs-target="#deleteProduct-{{$collaborator->id}}">
                        <i class="fas fa-trash fa-sm fa-fw"></i>
                    </a>

                    @include('partials.modal')

                </td>
            </tr>
            @empty
            <tr class="table-primary">
                <td scope="row">No collaborator to show yet</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection