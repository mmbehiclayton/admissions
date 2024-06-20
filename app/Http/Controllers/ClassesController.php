<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Classes;
use App\Models\Streams;
use Illuminate\Http\Request;


class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $classes = Classes::with(['branches','streams'])->paginate(20);

        $pageData = [
            'title' => 'CLASS LISTINGS ',
            'classes' => $classes
        ];

        // dd($classes);
       
        return  view('classes.index', $pageData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $branches = Branch::all();
        $pageData = [
            'title' => 'CLASS LISTING',
            'branches' => $branches,
        ];
        return view('classes.create', $pageData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Classes $class)
    {
        //
        $request->validate([
            'name' => 'required',
        ]);

        $class->name = $request->input('name');
        $class->branch_id = $request->input('branch_id');
        $class->save();

        return redirect(route('classes.index'))->with('success', 'Successfully added a class');
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

        $class = Classes::find($id);

        $branches = Branch::all();

        $pageData = [
            'title' => 'CLASS LISTING',
            'branches' => $branches,
            'class' => $class
        ];
        return view('classes.edit', $pageData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classes $class)
    {
        //
       
        $request->validate([
            'name' => 'required',
            'stream_id' => 'required',
        ]);

        $class->name = $request->input('name');
        $class->branch_id = $request->input('branch_id');
        $class->update();

        return redirect(route('classes.index'))->with('success', 'Successfully updated a class');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classes $class)
    {
        //
        $class->delete();
        return redirect(route('classes.index'))->with('success', 'succesfully deleted class data');
    }
}
