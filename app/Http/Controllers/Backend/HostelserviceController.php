<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Hostelservice;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class HostelserviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $hostels = Hostelservice::paginate(15);
        return view('backend.hostelfacility.index', compact('hostels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.hostelfacility.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'brief_description' => 'required|string',

        ]);

        $hostel = new Hostelservice;

        $hostel->brief_description = $request->brief_description;



        // Debugging: Stop the execution and dump the data


        $hostel->save();
        Artisan::call('cache:clear');
        return back()->with('success', 'Hostel Facility  added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('backend.hostelfacility.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $hostels = Hostelservice::findOrFail(decrypt($id));
        return view('backend.hostelfacility.edit', compact('hostels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([

        ]);
        $hostel = Hostelservice::findOrFail(decrypt($id));

        $hostel->brief_description = $request-> brief_description;
        $hostel->update();
        Artisan::call('cache:clear');
        return back()->with('success', 'Hostel Facility updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Hostelservice::findOrFail(decrypt($id))->delete();
        Artisan::call('cache:clear');
        return back()->with('success', 'Hostel Facility deleted successfully.');
    }
}
