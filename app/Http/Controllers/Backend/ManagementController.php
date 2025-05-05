<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Management;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $managements = Management::paginate(15);
        return view('backend.management.index', compact('managements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.management.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'designation' => 'required|string',
            'sub_designation' => 'required|string',
            'brief_description' => 'required|string',
            'thumbnail_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $management = new Management;
        $management->name = $request->name;
        $management->designation = $request->designation;
        $management->sub_designation = $request->sub_designation;
        $management->brief_description = $request->brief_description;

        if ($request->hasFile('thumbnail_img')) {
            $fileName = time() . '-board-' . $request->file('thumbnail_img')->getClientOriginalName();
            $filePath = $request->file('thumbnail_img')->storeAs('uploads/boards', $fileName, 'public');
            $management->thumbnail_img = '/public/storage/' . $filePath;
        }

        $management->save();
        Artisan::call('cache:clear');
        return back()->with('success', 'Management added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('backend.boardofdirectories.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $management = Management::findOrFail(decrypt($id));
        return view('backend.management.edit', compact('management'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'designation' => 'required|string',
            'sub_designation' => 'required|string',
            'brief_description' => 'required|string',
            'thumbnail_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $management = Management::findOrFail(decrypt($id));

        $management->name = $request->name;
        $management->designation = $request->designation;
        $management->sub_designation = $request->sub_designation;
        $management->brief_description = $request-> brief_description;

        if ($request->hasFile('thumbnail_img')) {
            $fileName = time() . '-team-' . $request->file('thumbnail_img')->getClientOriginalName();
            $filePath = $request->file('thumbnail_img')->storeAs('uploads/boards', $fileName, 'public');
            $management->thumbnail_img = '/public/storage/' . $filePath;
        }
        $management->update();
        Artisan::call('cache:clear');
        return back()->with('success', 'Management updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Management::findOrFail(decrypt($id))->delete();
        Artisan::call('cache:clear');
        return back()->with('success', ' Management deleted successfully.');
    }
}
