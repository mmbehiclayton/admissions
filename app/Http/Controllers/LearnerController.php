<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Learner;
use App\Models\SchoolClass;
use App\Models\Stream;
use Illuminate\Http\Request;
use Illuminate\View\View; #new

class LearnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index():View
    {
        $learners = Learner::with('stream')->get();
        return view('learners.index', compact('learners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = SchoolClass::with(['branch', 'streams'])
            ->get()
            ->flatMap(function($schoolClass) {
                return $schoolClass->streams->map(function($stream) use ($schoolClass) {
                    return [
                        'id' => $stream->id,
                        'name' => "{$schoolClass->branch->name} - {$schoolClass->name} - {$stream->name}"
                    ];
                });
            });

        return view('learners.create', compact('classes'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'adm_no' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'dob' => 'required|date',
            'birth_cert_no' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
            'nemis_code' => 'nullable|string|max:255',
            'doa' => 'required|date',
            'contact' => 'required|string|max:255',
            'school_class_id' => 'required|exists:school_classes,id', // Add this line
        ]);

        Learner::create($validated);

        return redirect()->route('learners.index')->with('success', 'Learner added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Learner  $learner
     * @return \Illuminate\Http\Response
     */
    public function show(Learner $learner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Learner  $learner
     * @return \Illuminate\Http\Response
     */
    public function edit(Learner $learner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Learner  $learner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Learner $learner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Learner  $learner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Learner $learner)
    {
        //
    }
}
