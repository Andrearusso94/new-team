<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Collaborator;
use App\Models\Role;
use App\Http\Requests\StoreCollaboratorRequest;
use App\Http\Requests\UpdateCollaboratorRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class CollaboratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Role $role)
    {
        $collaborators = Collaborator::orderByDesc('id')->get();
        //dd($collaborators);
        return view('admin.collaborators.index', compact('collaborators', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Collaborator $collaborator)
    {
        $roles = Role::all();
        return view('admin.collaborators.create', compact('collaborator', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCollaboratorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCollaboratorRequest $request)
    {
        $val_data = $request->validated();
        //dd($val_data);
        if ($request->hasFile('image')) {
            $image = Storage::put('uploads', $val_data['image']);
            //dd($image);
            $val_data['image'] = $image;
        }

        $collaborator_slug = Collaborator::generateSlug($val_data['name']);
        $val_data['slug'] = $collaborator_slug;

        Collaborator::create($val_data);
        return to_route('admin.collaborators.index')->with('message', "Collaborator added successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collaborator  $collaborator
     * @return \Illuminate\Http\Response
     */
    public function show(Collaborator $collaborator)
    {
        return view('admin.collaborators.show', compact('collaborator'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Collaborator  $collaborator
     * @return \Illuminate\Http\Response
     */
    public function edit(Collaborator $collaborator)
    {
        $roles = Role::all();
        return view('admin.collaborators.edit', compact('collaborator', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCollaboratorRequest  $request
     * @param  \App\Models\Collaborator  $collaborator
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCollaboratorRequest $request, Collaborator $collaborator)
    {
        $val_data = $request->validated();
        //dd($val_data);
        if ($request->hasFile('image')) {
            if ($collaborator->image) {
                storage::delete($collaborator->image);
            }
            $image = Storage::put('uploads', $val_data['image']);
            //dd($cover_image);
            $val_data['image'] = $image;
        }


        $collaborator_slug = Collaborator::generateSlug($val_data['name']);
        $val_data['slug'] = $collaborator_slug;

        $collaborator->update($val_data);
        return to_route('admin.collaborators.index')->with('message', "Collaborator updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collaborator  $collaborator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collaborator $collaborator)
    {
        if ($collaborator->image) {
            Storage::delete($collaborator->image);
        }
        $collaborator->delete();

        return to_route('admin.collaborators.index')->with('message', "Collaborator deleted successfully!");
    }
}
