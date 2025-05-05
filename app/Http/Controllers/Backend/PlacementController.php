<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Placementservice;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class PlacementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $placements = Placementservice::paginate(15);
        return view('backend.placement.index', compact('placements'));
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.placement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'brief_description' => 'required|string',

        ]);

        $placement = new Placementservice;

        $placement->brief_description = $request->brief_description;



        // Debugging: Stop the execution and dump the data


        $placement->save();
        Artisan::call('cache:clear');
        return back()->with('success', 'Placement Service added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('backend.placement.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $placements = Placementservice::findOrFail(decrypt($id));
        return view('backend.placement.edit', compact('placements'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([

        ]);
        $placement = Placementservice::findOrFail(decrypt($id));

        $placement->brief_description = $request-> brief_description;
        $placement->update();
        Artisan::call('cache:clear');
        return back()->with('success', 'Placement Service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Placementservice::findOrFail(decrypt($id))->delete();
        Artisan::call('cache:clear');
        return back()->with('success', 'Placement Service deleted successfully.');
    }
}
