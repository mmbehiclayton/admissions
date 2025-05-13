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
        // Retrieve all streams of a specific branch
        $user = auth()->user();

        if($user->hasRole('admin')){
            $streams = Streams::with('classes')->get();

        }
        else{

        $streams = Streams::with('classes')
        ->whereHas('classes', function ($query) use ($user) {
            $query->where('branch_id', $user->branch_id);
        })

        ->get();
        }




        // Pass data to the view
        $pageData = [
            'title' => 'Active Classes',
            'streams' => $streams
        ];

        return view('streams.all', $pageData);
    }

    public function showLearners($stream_id, Request $request)
    {
        $status = $request->input('status'); // 'active', 'inactive', 'all' or null
        $perPage = $request->input('per_page', 10);
        $search = $request->input('search', '');

        // Fetch stream
        $stream = Streams::findOrFail($stream_id);

        // Start learners query from the stream relationship
        $learnersQuery = $stream->learners()->newQuery();

        // Handle status filter
        if ($status !== 'all') {
            if (!empty($status)) {
                $learnersQuery->where('status', $status);
            } else {
                $learnersQuery->where('status', 'active'); // default
            }
        }

        // Handle search filter
        if (!empty($search)) {
            $learnersQuery->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                ->orWhere('name', 'like', "%$search%"); // Replace with actual searchable field(s)
            });
        }

        // Paginate results, preserving query strings
        $learners = $learnersQuery->paginate($perPage)->appends($request->query());

        // Stats
        $totalActiveLearners = $stream->learners()->where('status', 'active')->count();
        $totalInactiveLearners = $stream->learners()->where('status', 'inactive')->count();
        $totalMaleLearners = $stream->learners()->where('status', 'active')->where('gender', 'male')->count();
        $totalFemaleLearners = $stream->learners()->where('status', 'active')->where('gender', 'female')->count();
        $viewType = request('view', 'table'); // default to table

        return view('streams.learners', [
            'title' => '>> Learners ' . $stream->classes->name . ' ' . $stream->name,
            'stream' => $stream,
            'learners' => $learners,
            'totalActiveLearners' => $totalActiveLearners,
            'totalInactiveLearners' => $totalInactiveLearners,
            'totalMaleLearners' => $totalMaleLearners,
            'totalFemaleLearners' => $totalFemaleLearners,
            'stream_id' => $stream_id,
            'viewType' => $viewType,
        ]);


;
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
