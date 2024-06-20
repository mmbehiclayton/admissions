<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Learners;
use App\Models\Streams;
use Illuminate\Http\Request;

class LearnersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $learners = Learners::with(['streams.classes'])->paginate(10);
        $pageData = [
            'title' => 'LEARNERS LISTING ',
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

        return redirect(route('learners.index'))->with('success', 'Learner updated successfully !');
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
}
