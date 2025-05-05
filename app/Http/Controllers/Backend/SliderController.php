<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::paginate(15);
        return view('backend.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        $slider = new Slider;

        if ($request->hasFile('image')) {
            $fileName = time() . '-slider-' . $request->file('image')->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('uploads/sliders', $fileName, 'public');
            $slider->thumbnail_img = '/public/storage/' . $filePath; // Fixed path
        }


        $slider->save();
        Artisan::call('cache:clear');
        return redirect()->route('sliders.index')->with('success', 'Slider added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $slider = Slider::findOrFail(decrypt($id));
        return view('backend.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // Validate the hyperlink
        ]);

        $slider = Slider::findOrFail(decrypt($id));

        if ($request->hasFile('image')) {
            $fileName = time() . '-slider-' . $request->file('image')->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('uploads/sliders', $fileName, 'public');
            $slider->thumbnail_img = '/public/storage/' . $filePath; // Fixed path
        }



        $slider->save(); // Save the updated model
        Artisan::call('cache:clear');
        return redirect()->route('sliders.index')->with('success', 'Slider updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail(decrypt($id));
        $slider->delete();
        Artisan::call('cache:clear');
        return redirect()->route('sliders.index')->with('success', 'Slider deleted successfully.');
    }
}
