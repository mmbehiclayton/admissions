<?php

namespace App\Http\Controllers;

use App\Exports\StreamLearnersExport;
use App\Models\Branch;
use App\Models\Classes;
use App\Models\Streams;
use App\Models\User;
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
    public function showAllStreams()
    {
        // Retrieve all streams
        $streams = Streams::with('classes')->get();

        // Pass data to the view
        $pageData = [
            'title' => 'All Streams',
            'streams' => $streams
        ];

        return view('streams.all', $pageData);
    }

    public function showLearners($stream_id, Request $request)
{

    
    $status = $request->input('status', '');
    $perPage = $request->input('per_page', 10); // Default to 10 if not specified
    $search = $request->input('search', ''); // Search term

    // Fetch the stream
    $stream = Streams::findOrFail($stream_id);

    // Filter learners based on status and search term, then paginate
    $learnersQuery = $stream->learners()->newQuery();

    if (!empty($status)) {
        $learnersQuery->where('status', 'like', "%$status%");
    }

    if (!empty($search)) {
        $learnersQuery->where(function($q) use ($search) {
            $q->where('name', 'like', "%$search%")
              ->orWhere('other_field', 'like', "%$search%"); // Adjust this to include other searchable fields
        });
    }

    $learners = $learnersQuery->paginate($perPage);


    // Retrieve counts for different categories of learners
    $totalActiveLearners = $stream->learners()->where('status', 'active')->count();
    $totalInactiveLearners = $stream->learners()->where('status', 'inactive')->count();
    $totalMaleLearners = $stream->learners()->where('status', 'active')->where('gender', 'male')->count();
    $totalFemaleLearners = $stream->learners()->where('status', 'active')->where('gender', 'female')->count();

    // Prepare data for the view
    $pageData = [
        'title' => 'Learners ' . $stream->classes->name . ' ' . $stream->name,
        'stream' => $stream,
        'learners' => $learners, // Paginate active learners with default of 50 per page
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
        $auth_user = User::find(auth()->user()->id);

        if (!$auth_user->can('edit streams')) {
            return redirect()->back()->with('error', env('PERMISSION_ERROR_MESSAGE'));
        }  

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
        $auth_user = User::find(auth()->user()->id);
        if (!$auth_user->can('edit streams')) {
            return redirect()->back()->with('error', env('PERMISSION_ERROR_MESSAGE'));
        }  
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
        $auth_user = User::find(auth()->user()->id);
        if (!$auth_user->can('delete streams')) {
            return redirect()->back()->with('error', env('PERMISSION_ERROR_MESSAGE'));
        }  

        $stream->delete();
        return redirect(route('streams.index'))->with('Success','Successfully deleted stream record');
    }
    //export stream learners

    public function exportLearners($stream_id)
    {
        return Excel::download(new StreamLearnersExport($stream_id), (new StreamLearnersExport($stream_id))->getFileName());
    }
}
