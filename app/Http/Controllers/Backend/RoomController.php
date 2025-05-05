<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Room;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $details = Room::paginate(15);
        return view('backend.rooms.index', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.rooms.create');
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

        $detail = new Room;


        if ($request->hasFile('thumbnail_img')) {
            $fileName = time() . '-team-' . $request->file('thumbnail_img')->getClientOriginalName();
            $filePath = $request->file('thumbnail_img')->storeAs('uploads/rooms', $fileName, 'public');
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
        return view('backend.rooms.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $detail =Room::findOrFail(decrypt($id));
        return view('backend.rooms.edit', compact('detail'));
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
        $detail = Room::findOrFail(decrypt($id));


        if ($request->hasFile('thumbnail_img')) {
            $fileName = time() . '-team-' . $request->file('thumbnail_img')->getClientOriginalName();
            $filePath = $request->file('thumbnail_img')->storeAs('uploads/rooms', $fileName, 'public');
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
        Room::findOrFail(decrypt($id))->delete();
        Artisan::call('cache:clear');
        return back()->with('success', 'Detail deleted successfully.');
    }
}
