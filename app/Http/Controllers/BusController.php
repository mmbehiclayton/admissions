<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buses = Bus::withCount('learners')->get();
        return view('buses.index', compact('buses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'number_plate' => 'required|unique:buses,number_plate',
            'driver'       => 'required|string',
            'contact'      => 'required|string',
            'assistant'    => 'nullable|string',
            'route'        => 'nullable|string',
            'capacity'     => 'nullable|integer|min:1',
            'owner'        => 'nullable|string',
            'type'         => 'nullable|in:Private,Public',
        ]);

        Bus::create($validated);

        return redirect()->route('buses.index')->with('success', 'Bus registered successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Bus $bus)
    {
        return view('buses.show', compact('bus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bus $bus)
    {
        return view('buses.edit', compact('bus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bus $bus)
    {
        $validated = $request->validate([
            'number_plate' => 'required|unique:buses,number_plate,' . $bus->id,
            'driver'       => 'required|string',
            'contact'      => 'required|string',
            'assistant'    => 'nullable|string',
            'route'        => 'nullable|string',
            'capacity'     => 'nullable|integer|min:1',
            'owner'        => 'nullable|string',
            'type'         => 'nullable|in:Private,Public',
        ]);

        $bus->update($validated);

        return redirect()->route('buses.index')->with('success', 'Bus updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bus $bus)
    {
        $bus->delete();
        return redirect()->route('buses.index')->with('success', 'Bus deleted successfully!');
    }
}
