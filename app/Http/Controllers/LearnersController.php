<?php

namespace App\Http\Controllers;

use App\Exports\ClassTransportList;
use App\Models\Classes;
use App\Models\Learners;
use App\Models\Streams;
use App\Imports\LearnersImport;
use App\Exports\AllLearnersExport;
use App\Models\Bus;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LearnersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve the authenticated user
        $user = auth()->user();

        // Retrieve learners only for the user's branch
        $learners = Learners::with(['streams.classes'])
            ->whereHas('streams.classes', function ($query) use ($user) {
                $query->where('branch_id', $user->branch_id);
            })
            ->paginate(50);

        // Prepare data for the view
        $pageData = [
            'title' => 'Al-Ameen Nemis List',
            'learners' => $learners,
        ];

        // Return the view with the learners data
        return view('learners.index', $pageData);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get the logged-in user
        $user = auth()->user();

        // Get the user's associated branch
        $branch = $user->branch;

        // Get streams that belong to the user's branch
        $streams = Streams::with('classes')
        ->whereHas('classes', function ($query) use ($user) {
            $query->where('branch_id', $user->branch_id);
        })->get();

        // Get all classes related to the user's branch
        $classes = Classes::where('branch_id', $user->branch_id)->get();
        $buses = Bus::all();

        $pageData = [
            'classes' => $classes,
            'streams' => $streams,
            'buses' => $buses,
            'title' => 'LEARNERS CREATE PAGE'
        ];

        return view('learners.create', $pageData);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        $request->validate([
            'stream_id' => 'required',
            'name' => 'required',
            'assessment_no' => 'nullable',
            'gender' => 'required',
            'dob' => 'required|date',
            'bc_pp_entry_no' => 'unique:students,bc_pp_entry_no',
            'nationality' => 'required',
            'nemis_code' => 'nullable',
            'date_of_addmission' => 'required|date',
            'contact' => 'nullable',
            'admission_no' => 'required|unique:students,admission_no',
            'co_curricular_activity' => 'nullable',
            'transport_route' => 'nullable',
            'bus_id' => 'nullable|exists:buses,id',
            'lunch' => 'required|boolean'
        ]);

        $learner = new Learners();
        $learner->stream_id = $request->input('stream_id');
        $learner->name = $request->input('name');
        $learner->assessment_no = $request->input('assessment_no');
        $learner->gender = $request->input('gender');
        $learner->dob = $request->input('dob');
        $learner->bc_pp_entry_no = $request->input('bc_pp_entry_no');
        $learner->nationality = $request->input('nationality');
        $learner->nemis_code = $request->input('nemis_code');
        $learner->admission_no = $request->input('admission_no');
        $learner->date_of_addmission = $request->input('date_of_addmission');
        $learner->contact = $request->input('contact');
        $learner->co_curricular_activity = $request->input('co_curricular_activity');
        $learner->transport_route = $request->input('transport_route');
        $learner->bus_id = $request->input('bus_id');
        $learner->lunch = $request->input('lunch');
        $learner->status = 'active';
        $learner->save();

        $streamId = $learner->stream_id;
        return redirect("/streams/{$streamId}/learners")->with('success', 'Learner created successfully!');

        // return redirect(route('admin.index'))->with('success', 'Learner Added successfully !');

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
        $classes = Classes::all();
        $streams = Streams::all();
        $learner = Learners::find($id);
        $buses = Bus::all();

        $pageData = [
            'title' => 'LEARNERS EDIT PAGE',
            'classes' => $classes,
            'streams' => $streams,
            'learner' => $learner,
            'buses' => $buses
        ];

        return view('learners.edit', $pageData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'stream_id' => 'required',
            'name' => 'required',
            'assessment_no' => 'nullable',
            'gender' => 'required',
            'dob' => 'required|date',
            'bc_pp_entry_no' => 'required',
            'nationality' => 'required',
            'nemis_code' => 'nullable',
            'date_of_addmission' => 'required',
            'contact' => 'required',
            'admission_no' => 'required',
            'co_curricular_activity' => 'required',
            'transport_route' => 'required',
            'bus_id' => 'nullable|exists:buses,id',
            'lunch' => 'required|boolean'
        ]);

        $learner = Learners::find($id);
        $learner->stream_id = $request->input('stream_id');
        $learner->name = $request->input('name');
        $learner->assessment_no = $request->input('assessment_no');
        $learner->gender = $request->input('gender');
        $learner->dob = $request->input('dob');
        $learner->bc_pp_entry_no = $request->input('bc_pp_entry_no');
        $learner->nationality = $request->input('nationality');
        $learner->nemis_code = $request->input('nemis_code');
        $learner->admission_no = $request->input('admission_no');
        $learner->date_of_addmission = $request->input('date_of_addmission');
        $learner->contact = $request->input('contact');
        $learner->status = $request->input('status');
        $learner->co_curricular_activity = $request->input('co_curricular_activity');
        $learner->transport_route = $request->input('transport_route');
        $learner->bus_id = $request->input('bus_id');
        $learner->lunch = $request->input('lunch');
        $streamId = $learner->stream_id;

        $learner->update();

        return redirect("/streams/{$streamId}/learners")->with('success', 'Learner updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Learners $learner)
    {
        //

        $learner->delete();
        return redirect(route('learners.index'))->with('success', 'Learner deleted successfully !');

    }
    public function upload()
    {
        return view('learners.upload');
    }

    public function bulkUpload(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => [
                'required',
                'file'
            ],
        ]);

        Excel::import(new LearnersImport, $request->file('file'));


        return redirect()->route('learners.index')->with('success', 'Learners uploaded successfully');
    }

    //export learners
    public function export()
    {
        return Excel::download(new AllLearnersExport, 'alllearners.xlsx');
    }

    //bulk delete Learners
    public function bulkDelete(Request $request)
    {
        $ids = $request->input('selected_ids', []);
        Learners::whereIn('id', $ids)->delete();

        return redirect()->route('learners.index')->with('success', 'Selected learners deleted successfully.');
    }

}
