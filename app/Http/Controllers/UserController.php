<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  
    public function index()
    {
        //
        $users = User::paginate(10);
        $pageData = [
            'title' => 'Users List',
            'users' => $users,
        ];
        return view('users.index', $pageData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $roles = Role::all();
        $permissions = Permission::all();
        
        $pageData = [
            'title' => 'User Creation page',
            'permissions' => $permissions,
            'roles' => $roles,
        ];
        return view('users.create', $pageData);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $user = User::find(auth()->user()->id);
        if (!$user->can('create user')) {
            return redirect()->back()->with('error', env('PERMISSION_ERROR_MESSAGE'));
        } 
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $activity_type = 'User creation';
        $description = 'Created '. $request->name. ' system user' ;
        
        User::saveAuditTrail($activity_type, $description);

        return redirect()->back()->with('success', 'User added successfully');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $user = User::find($id);
        $roles = $user->getRoleNames();
        $permissions = $user->getPermissionsViaRoles();
        $directPermissions = $user->getDirectPermissions();
        $pageData = [
            'title' => 'User details',
            'user' => $user,
            'roles' => $roles,
            'permissions' => $permissions,
            'directPermissions' => $directPermissions,
        ];
        // dd($pageData);

        return view('users.show', $pageData);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       
        $user = User::find(auth()->user()->id);
        if (!$user->can('edit users')) {
            return redirect()->back()->with('error', env('PERMISSION_ERROR_MESSAGE'));
        } 
        $user = User::find($id);

        $roles = Role::all();
        $permissions = Permission::all();

        $branches = Branch::all();

        $userRole = $user->getRoleNames();
        $userPermissions = $user->getDirectPermissions()->pluck('name')->toArray();

        

        $userBranch = Branch::find($user->branch_id)->name;
      
        
        $pageData = [
            'title' => 'Edit System Details for '. $user->name,
            'user' => $user,
            'roles' => $roles,
            'userRole' =>$userRole,
            'userBranch' => $userBranch,
            'branches' => $branches,
            'permissions' => $permissions,
            'userPermissions' => $userPermissions,
        ];

        
       
        return view('users.edit', $pageData);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find(auth()->user()->id);
        if (!$user->can('edit users')) {
            return redirect()->back()->with('error', env('PERMISSION_ERROR_MESSAGE'));
        } 
    
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
    
        $user = User::findOrFail($id);
        $user->syncRoles($request->roles);
    
        $permissions = $request->input('permissions', []);
    
        $currentPermissions = $user->getAllPermissions()->pluck('name')->toArray();
    
        $permissionsToRevoke = array_diff($currentPermissions, $permissions);

        // dd($permissionsToRevoke);

    
        $user->revokePermissionTo($permissionsToRevoke);
        $user->givePermissionTo($permissions);
    
        $user->name = $request->name;
        $user->email = $request->email;
        
        $user->save();

        return back()->with('success', 'User detail updated successfully !');
    }
    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        $auth_user = User::find(auth()->user()->id);
        if (!$auth_user->can('create bioData')) {
            return redirect()->back()->with('error', env('PERMISSION_ERROR_MESSAGE'));
        } 
        $user->delete();


        toastr()->success('User deleted successfully');
    }
}
