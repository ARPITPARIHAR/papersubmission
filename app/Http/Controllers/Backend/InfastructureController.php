<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Infastructure;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class InfastructureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $details = Infastructure::paginate(15);
        return view('backend.infa.index', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.infa.create');
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

        $detail = new Infastructure;



        if ($request->hasFile('thumbnail_img')) {
            $fileName = time() . '-team-' . $request->file('thumbnail_img')->getClientOriginalName();
            $filePath = $request->file('thumbnail_img')->storeAs('uploads/infastructures', $fileName, 'public');
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
        return view('backend.infa.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $detail =Infastructure::findOrFail(decrypt($id));
        return view('backend.infa.edit', compact('detail'));
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
        $detail = Infastructure::findOrFail(decrypt($id));

        if ($request->hasFile('thumbnail_img')) {
            $fileName = time() . '-team-' . $request->file('thumbnail_img')->getClientOriginalName();
            $filePath = $request->file('thumbnail_img')->storeAs('uploads/infastructures', $fileName, 'public');
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
        Infastructure::findOrFail(decrypt($id))->delete();
        Artisan::call('cache:clear');
        return back()->with('success', 'Detail deleted successfully.');
    }
}
