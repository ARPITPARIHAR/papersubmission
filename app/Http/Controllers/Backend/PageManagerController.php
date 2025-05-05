<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PageManager;
use Illuminate\Http\Request;

class PageManagerController extends Controller
{
    public function index()
    {
        $menus = PageManager::paginate(10); // You can adjust the pagination limit as needed
        return view('backend.pagemanager.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pagemanager.create');
    }




    public function store(Request $request)
{
    // Validation
    $request->validate([
        'filename'      => 'required|string|max:255',
        'page_name'     => 'required|string|max:255',

        'content'       => 'nullable|string',
    ]);

    // Create a new PageManager instance
    $pageManager = new PageManager;
    $pageManager->filename = $request->filename;
    $pageManager->page_name = $request->page_name;
   
    $pageManager->content = $request->content;

    // Save the PageManager instance to the database
    $pageManager->save();

    // Redirect back with a success message
    return redirect()->route('pagemanager.index')->with('success', 'Page added successfully.');
}


public function edit($id)
{

    $pageManager = PageManager::findOrFail($id);

    // Return the edit view with the pageManager data
    return view('backend.pagemanager.edit', compact('pageManager'));
}




}
