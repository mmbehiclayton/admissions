<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\User;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class BranchesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $branches = Branch::paginate(15);
        $pageData = [
            'title' => 'BRANCH LISTINGS  ',
            'branches' => $branches
        ];

        

        return  view('branches.index', $pageData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $auth_user = User::find(auth()->user()->id);
        if (!$auth_user->can('create branches')) {
            return redirect()->back()->with('error', env('PERMISSION_ERROR_MESSAGE'));
        } 

        $pageData = [
            'title' => 'BRANCH CREATE PAGE',
        ];
        
        return  view('branches.create', $pageData);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $auth_user = User::find(auth()->user()->id);
        if (!$auth_user->can('create branches')) {
            return redirect()->back()->with('error', env('PERMISSION_ERROR_MESSAGE'));
        }
        $request->validate([
            'name' => 'required'
        ]);

        $data = new Branch();
        $data->name = $request->input('name');
        $data->save();


        return redirect(route('branches.index'))->with('success', 'Successfully Added a branch');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $auth_user = User::find(auth()->user()->id);
        if (!$auth_user->can('edit branches')) {
            return redirect()->back()->with('error', env('PERMISSION_ERROR_MESSAGE'));
        }
        $branch = Branch::find($id);
        $pageData = [
            'title' => 'BRANCH EDIT PAGE',
            'branch' => $branch
        ];
        
        return  view('branches.edit', $pageData);

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $auth_user = User::find(auth()->user()->id);
        if (!$auth_user->can('edit branches')) {
            return redirect()->back()->with('error', env('PERMISSION_ERROR_MESSAGE'));
        }

        $request->validate([
            'name' => 'required'
        ]);

        $data = new Branch();
        $data->name = $request->input('name');
        $data->update();

        return redirect(route('branches.index'))->with('success', 'Successfully updated' );
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $branch)
    {
        //
        $auth_user = User::find(auth()->user()->id);
        if (!$auth_user->can('delete branches')) {
            return redirect()->back()->with('error', env('PERMISSION_ERROR_MESSAGE'));
        }

        $branch->delete();
        
        return redirect(route('branches.index'))->with('success', 'Deletion successfull ');
    }
}
