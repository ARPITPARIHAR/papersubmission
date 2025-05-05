<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::paginate(15);
        return view('backend.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'news_description' => 'required|string',

        ]);

        $news = new News;


        $news->news_description = $request->news_description;
        $news->hyperlink = $request->hyperlink;
        $news->save();
        Artisan::call('cache:clear');
        return back()->with('success', 'News added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('backend.news.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $news = News::findOrFail(decrypt($id));
        return view('backend.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([

         'news_description' => 'required|string',



        ]);
        $news = News::findOrFail(decrypt($id));

        $news->news_description = $request-> news_description;
        $news->hyperlink = $request->hyperlink;
        $news->update();
        Artisan::call('cache:clear');
        return back()->with('success', 'News updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        News::findOrFail(decrypt($id))->delete();
        Artisan::call('cache:clear');
        return back()->with('success', 'News deleted successfully.');
    }
}
