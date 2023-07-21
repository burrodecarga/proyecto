<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:roles|max:255',
        ]);

        $role = Role::create(['name'=>strtolower($validated['name'])]);
        $role->syncPermissions($request->permission);
        $message = _('role create');
        return redirect(route('roles.index'))->with('success',$message);


    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
       $permissions = $role->permissions;
       return view('roles.show',compact('role','permissions')); //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
       $role_permissions = $role->permissions()->pluck('id')->toArray();
       $permissions = Permission::all();
       return view('roles.edit',compact('role','permissions','role_permissions'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'name' => 'required|unique:roles,name,'.$role->id,
        ]);

        if($role->id >3){
            $role->name = strtolower($validated['name']);
            $role->save();
        };
        $role->syncPermissions($request->permission);
        $message = _('role updated');
        return redirect(route('roles.index'))->with('success',$message);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $autorization = $this->authorize('delete',$role);
        $role->delete();
        $message = _('role deleted');
        return redirect(route('roles.index'))->with('success',$message);


    }
}
