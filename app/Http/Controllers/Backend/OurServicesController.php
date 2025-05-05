<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Ourservice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class OurServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $boards = Ourservice::paginate(15);
        return view('backend.ourservices.index', compact('boards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.ourservices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',

            'brief_description' => 'required|string',
            'thumbnail_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $board = new Ourservice();

        $board->title = $request->title;

        $board->brief_description = $request->brief_description;

        if ($request->hasFile('thumbnail_img')) {
            $fileName = time() . '-board-' . $request->file('thumbnail_img')->getClientOriginalName();
            $filePath = $request->file('thumbnail_img')->storeAs('uploads/boards', $fileName, 'public');
            $board->thumbnail_img = '/public/storage/' . $filePath;
        }

        // Debugging: Stop the execution and dump the data


        $board->save();
        Artisan::call('cache:clear');
        return back()->with('success', 'Our Services added successfully.');
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

        $board = Ourservice::findOrFail(decrypt($id));
        return view('backend.ourservices.edit', compact('board'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',


            'thumbnail_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $board = Ourservice::findOrFail(decrypt($id));
        $board->title= $request->title;

        $board->brief_description = $request-> brief_description;

        if ($request->hasFile('thumbnail_img')) {
            $fileName = time() . '-team-' . $request->file('thumbnail_img')->getClientOriginalName();
            $filePath = $request->file('thumbnail_img')->storeAs('uploads/boards', $fileName, 'public');
            $board->thumbnail_img = '/public/storage/' . $filePath;
        }
        $board->update();
        Artisan::call('cache:clear');
        return back()->with('success', 'Our Services updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       Ourservice::findOrFail(decrypt($id))->delete();
        Artisan::call('cache:clear');
        return back()->with('success', 'Our Services deleted successfully.');
    }
}
