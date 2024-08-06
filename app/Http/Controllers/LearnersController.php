<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Learners;
use App\Models\Streams;
use App\Imports\LearnersImport;
use App\Exports\AllLearnersExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LearnersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $learners = Learners::with(['streams.classes'])->paginate(50);
        $pageData = [
            'title' => 'Al-Ameen Nemis List ',
            'learners' => $learners,
        ];

        // dd($learners);
        return view('learners.index', $pageData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = Classes::all();
        $streams = Streams::all();

        $pageData = [
            'classes' => $classes,
            'streams' => $streams,
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
            'assessment_no' => 'required|unique:students,assessment_no',
            'gender' => 'required',
            'dob' => 'required|date',
            'bc_pp_entry_no' => 'required|unique:students,bc_pp_entry_no', 
            'nationality' => 'required',
            'nemis_code' => 'required|unique:students,nemis_code',
            'date_of_addmission' => 'required|date',
            'contact' => 'nullable',
            'admission_no' => 'required|unique:students,admission_no'    
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
        $learner->status = 'active';
        $learner->save();

        return redirect(route('learners.index'))->with('success', 'Learner Added successfully !');

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

        $pageData = [
            'title' => 'LEARNERS EDIT PAGE',
            'classes' => $classes,
            'streams' => $streams,
            'learner' => $learner
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
            'assessment_no' => 'required',
            'gender' => 'required',
            'dob' => 'required|date',
            'bc_pp_entry_no' => 'required',
            'nationality' => 'required',
            'nemis_code' => 'required',
            'date_of_addmission' => 'required',
            'contact' => 'required',
            'admission_no' => 'required'    
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
        $learner->update();

        return redirect(route('streams.learners', $learner->stream_id))->with('success', 'Learner updated successfully !');
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



    


}
