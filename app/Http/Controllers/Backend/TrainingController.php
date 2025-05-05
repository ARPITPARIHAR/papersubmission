<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainings = Training::paginate(15);
        return view('backend.training.index', compact('trainings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.training.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'hyperlink' => 'nullable|url', // Validate the hyperlink
        ]);

        $training = new Training;

        if ($request->hasFile('image')) {
            $fileName = time() . '-training-' . $request->file('image')->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('uploads/trainings', $fileName, 'public');
            $training->thumbnail_img = '/public/storage/' . $filePath; // Updated to use storage path
        }

        $training->hyperlink = $request->input('hyperlink'); // Store the hyperlink
        $training->save();

        Artisan::call('cache:clear');

        return back()->with('success', 'Training added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $training = Training::findOrFail(decrypt($id));
        return view('backend.training.edit', compact('training'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'hyperlink' => 'nullable|url', // Validate the hyperlink
        ]);

        $training = Training::findOrFail(decrypt($id));

        if ($request->hasFile('image')) {
            $fileName = time() . '-training-' . $request->file('image')->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('uploads/trainings', $fileName, 'public');
            $training->thumbnail_img = '/public/storage/' . $filePath; // Updated to use storage path
        }

        $training->hyperlink = $request->input('hyperlink'); // Update the hyperlink
        $training->save();

        Artisan::call('cache:clear');

        return back()->with('success', 'Training updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Training::findOrFail(decrypt($id))->delete();
        Artisan::call('cache:clear');
        return back()->with('success', 'Training deleted successfully.');
    }
}
