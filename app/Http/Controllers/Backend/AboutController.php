<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\About;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $abouts = About::paginate(15);
        return view('backend.about.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'brief_description' => 'required|string',

        ]);

        $about = new About;

        $about->brief_description = $request->brief_description;


        $about->save();
        Artisan::call('cache:clear');
        return back()->with('success', 'About  added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('backend.about.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $abouts = About::findOrFail(decrypt($id));
        return view('backend.about.edit', compact('abouts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([

        ]);
        $about = About::findOrFail(decrypt($id));

        $about->brief_description = $request-> brief_description;
        $about->update();
        Artisan::call('cache:clear');
        return back()->with('success', 'About updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        About::findOrFail(decrypt($id))->delete();
        Artisan::call('cache:clear');
        return back()->with('success', 'About deleted successfully.');
    }
}
