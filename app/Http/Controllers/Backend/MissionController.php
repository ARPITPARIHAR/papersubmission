<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Mission;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class MissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $details = Mission::paginate(15);
        return view('backend.missions.index', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.missions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',

            'thumbnail_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        $detail = new Mission;



        if ($request->hasFile('thumbnail_img')) {
            $fileName = time() . '-team-' . $request->file('thumbnail_img')->getClientOriginalName();
            $filePath = $request->file('thumbnail_img')->storeAs('uploads/misions', $fileName, 'public');
            $detail->thumbnail_img = '/public/storage/' . $filePath;
        }

        $detail->title = $request->title;
        $detail->save();
        Artisan::call('cache:clear');
        return back()->with('success', 'Details added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('backend.missions.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $detail =Mission::findOrFail(decrypt($id));
        return view('backend.missions.edit', compact('detail'));
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
        $detail = Mission::findOrFail(decrypt($id));

        if ($request->hasFile('thumbnail_img')) {
            $fileName = time() . '-team-' . $request->file('thumbnail_img')->getClientOriginalName();
            $filePath = $request->file('thumbnail_img')->storeAs('uploads/misions', $fileName, 'public');
            $detail->thumbnail_img = '/public/storage/' . $filePath;
        }
        $detail->title= $request->title;
        $detail->update();
        Artisan::call('cache:clear');
        return back()->with('success', 'Detail updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Mission::findOrFail(decrypt($id))->delete();
        Artisan::call('cache:clear');
        return back()->with('success', 'Detail deleted successfully.');
    }
}
