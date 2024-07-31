<?php

namespace App\Http\Controllers;

use App\Exports\StreamLearnersExport;
use App\Models\Branch;
use App\Models\Classes;
use App\Models\Streams;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;
use Maatwebsite\Excel\Facades\Excel;

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
     * Display a listing of the resource.
     */
    public function showAllStreams($branch_id)
    {
        // Retrieve the branch with its classes and streams
        $branch = Branch::with(['classes.streams'])->findOrFail($branch_id);

        // Collect all streams from the classes of the branch
        $streams = $branch->classes->flatMap(function ($class) {
            return $class->streams;
        });

        // Prepare data for the view
        $pageData = [
            'title' => 'All Streams for ' . $branch->name,
            'streams' => $streams,
            'branch' => $branch
        ];

        return view('streams.all', $pageData);
    }


    public function showLearners($stream_id)
    {
        // Retrieve the stream with learners
        $stream = Streams::with(['learners' => function ($query) {
            $query->where('status', 'active');
        }])->findOrFail($stream_id);

        // Retrieve counts for different categories of learners
        $totalActiveLearners = $stream->learners()->where('status', 'active')->count();
        $totalInactiveLearners = $stream->learners()->where('status', 'inactive')->count();
        $totalMaleLearners = $stream->learners()->where('status', 'active')->where('gender', 'male')->count();
        $totalFemaleLearners = $stream->learners()->where('status', 'active')->where('gender', 'female')->count();

        // Prepare data for the view
        $pageData = [
            'title' => 'Learners/ ' . $stream->classes->name . ' ' . $stream->name,
            'stream' => $stream,
            'learners' => $stream->learners()->where('status', 'active')->paginate(50), // Paginate active learners with default of 50 per page
            'totalActiveLearners' => $totalActiveLearners,
            'totalInactiveLearners' => $totalInactiveLearners,
            'totalMaleLearners' => $totalMaleLearners,
            'totalFemaleLearners' => $totalFemaleLearners,
            'stream_id' => $stream_id
        ];

        return view('streams.learners', $pageData);
    }


        
    // pagination
    public function showStreamLearners(Request $request, $streamId)
    {
        $perPage = $request->input('per_page', 50); // Default to 50 records per page, can be adjusted via query param
        $stream = Streams::with('learners')->findOrFail($streamId);
        $learners = $stream->learners()->paginate($perPage);

        return view('streams.learners', compact('learners', 'stream'))
            ->with('title', 'Learners in ' . $stream->classes->name . ' ' . $stream->name);
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
    //export stream learners

    public function exportLearners($stream_id)
    {
        
        return Excel::download(new StreamLearnersExport($stream_id), (new StreamLearnersExport($stream_id))->getFileName());
    }
}
