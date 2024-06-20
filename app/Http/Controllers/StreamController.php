<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Classes;
use App\Models\Streams;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class StreamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        
        $streams = Streams::paginate(100);
        
        $pageData = [
            'title' => 'STREAM LISTINGS  ',
            'streams' => $streams
        ];
        

        return  view('streams.index', $pageData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $classes = Classes::with('branches')->get();

        $pageData = [
            'title' => 'STREAM CREATE PAGE',
            'classes' => $classes
        ];

        
        return  view('streams.create', $pageData);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Streams $stream)
    {

        // dd($request);

        $request->validate([
            'name' => 'required', 
            'classes_id' => 'required', 
        ]);

        $stream->name = $request->input('name');
        $stream->classes_id = $request->input('classes_id');
        $stream->save();

        return redirect(route('streams.index'))->with('success', 'Successfully created Stream ');

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
    public function edit(Streams $stream)
    {
        //
        $classes = Classes::all();
        $pageData = [
            'title' => 'STREAM EDIT PAGE',
            'classes' => $classes,
            'stream' =>$stream
        ];

        // dd($pageData);
        
        return  view('streams.edit', $pageData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Streams $stream)
    {
        //
        $request->validate([
            'name' => 'required',
            'classes_id' => 'required',
           
        ]);

        $stream->name = $request->input('name');
        $stream->classes_id = $request->input('classes_id');
        $stream->update();
  
        return redirect(route('streams.index'))->with('success', 'Successfully updated stream data' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Streams $stream)
    {
        //
        $stream->delete();
        return redirect(route('streams.index'))->with('Success','Successfully deleted stream record');
    }
}
