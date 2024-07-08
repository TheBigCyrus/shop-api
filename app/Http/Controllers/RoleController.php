<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleStoreRequest;
use App\Models\Role;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleStoreRequest $request)
    {
/*       */
        if ( \Illuminate\Support\Facades\Gate::denies('view-dashboard')){
            return  response()->json('not permission by gate');
        }

        $role = Role::query()->create([
            'title' => $request->title
        ]);
        $role->permissions()->attach($request->permissions);
        return $role->title ;
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $Role)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $Role)
    {
        $Role->update([
            'title' => $request->title
        ]);
        $Role->permissions()->sync($request->permissions);
        return $Role->title ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $Role)
    {
        $Role->permissions()->detach();
        $Role->delete();
        return ' ok';

    }
}
