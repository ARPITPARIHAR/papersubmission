<?php

namespace App\Http\Controllers\Backend;


use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::paginate(15);

        return view('backend.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */public function store(Request $request)
{
    $request->validate([
        'subcategory_id' => 'required|exists:subcategories,id', // Validate that the subcategory ID exists
        'logo' => 'required|mimes:pdf|max:2048',               // Validate the PDF file
    ]);

    $banners = new Banner;

    // Store the subcategory information
    $banners->subcategory_id = $request->subcategory_id;
    $banners->subcategory_name = $request->subcategory_name;

    // Handle the file upload
    if ($request->hasFile('logo')) {
        $fileName = time() . '-logo-' . $request->file('logo')->getClientOriginalName();
        $filePath = $request->file('logo')->storeAs('uploads/banners', $fileName, 'public');
        $banners->thumbnail_img = '/public/storage/' . $filePath;
    }

    $banners->save();

    // Clear cache
    Artisan::call('cache:clear');

    return back()->with('success', 'Banner added successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $client = Banner::findOrFail(decrypt($id));
        return view('backend.information.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $banner = Banner::findOrFail(decrypt($id));
        return view('backend.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([

           // Validate the hyperlink
            'logo' => 'nullable|mimes:pdf|max:2048',
        ]);
        $banners = Banner::findOrFail(decrypt($id));

 // Save the hyperlink

 $banners->subcategory_name = $request->subcategory_name;
        if ($request->hasFile('logo')) {
            $fileName = time() . '-logo-' . $request->file('logo')->getClientOriginalName();
            $filePath = $request->file('logo')->storeAs('uploads/banners', $fileName, 'public');
            $banners->thumbnail_img = '/public/storage/' . $filePath;
        }
        $banners->save();
        Artisan::call('cache:clear');
        return back()->with('success', 'Banner update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Banner::findOrFail(decrypt($id))->delete();
        Artisan::call('cache:clear');
        return back()->with('success', 'Banner deleted successfully.');
    }
}
