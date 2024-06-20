<?php

namespace App\Http\Controllers;

use App\DataTables\RolesDataTable;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yoeunes\Toastr\Facades\Toastr;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        //
        $roles = Role::all();
        $pageData = [
            'title' => 'ROLES PAGE',
            'roles' => $roles
        ];
        // dd($roles);

        return  view('roles.index', $pageData);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $rolePermissions = $role->permissions->pluck('id')->toArray();

        $pageData = [
            'role' => $role,
            'title' => 'PERMISSION VIEW PAGE',
            'permissions' => $permissions,
            'rolePermissions' => $rolePermissions,
        ];

        return view('roles.show', $pageData);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $rolePermissions = $role->permissions->pluck('id')->toArray();

        $pageData = [
            'role' => $role,
            'permissions' => $permissions,
            'rolePermissions' => $rolePermissions,
            'title' => "EDIT ROLE'S PERMISSIONS"
        ];
        return view('roles.edit', $pageData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        // Validate the incoming request
        $validated = $request->validate([
            'permissions' => 'array',
            'permissions.*' => 'integer|exists:permissions,id',
        ]);

        // Get the permission names from the validated IDs
        $permissions = Permission::whereIn('id', $validated['permissions'] ?? [])->pluck('name')->toArray();

        // Sync the permissions
        $role->syncPermissions($permissions);

        return redirect()->route('roles.index')->with('success', 'Permissions updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
        $role->delete();
        Toastr()->success('Successs', 'Deletion successfull ');
        return redirect(route('roles.index'));
    }
}
