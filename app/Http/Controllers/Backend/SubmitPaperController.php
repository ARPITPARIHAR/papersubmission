<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Paper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Artisan;

class SubmitPaperController extends Controller
{

    public function index()
    {
        $papers = Paper::paginate(15);
        return view('backend.submitpaper.index', compact('papers'));
    }


    public function create()
    {

        return view('backend.submitpaper.create');
    }


    public function store(Request $request)
    {




       $contact = new Paper();
        $contact->author_name = $request->author_name;
        $contact->country = $request->country;
        $contact->email = $request->email;
        $contact->co_authors = $request->co_authors;
        $contact->phone = $request->phone;
        $contact->address = $request->address;
        $contact->paper_id = $request->paper_id;
        $contact->paper_title = $request->paper_title;
        $contact->journal_name = $request->journal_name;


          if ($request->hasFile('manuscript')) {
        $fileName =  $request->file('manuscript')->getClientOriginalName();
        $filePath = $request->file('manuscript')->storeAs('uploads/banners', $fileName, 'public');
        if (env('ASSET_URL')) {
            $contact->manuscript_img = env('ASSET_URL').'/storage/' . $filePath;
        } else {
            $contact->manuscript_img = '/storage/' . $filePath;
        }

    }

    if ($request->hasFile('copyright')) {
        $fileName =  $request->file('copyright')->getClientOriginalName();
        $filePath = $request->file('copyright')->storeAs('uploads/banners', $fileName, 'public');
        if (env('ASSET_URL')) {
            $contact->copyright_img = env('ASSET_URL').'/storage/' . $filePath;
        } else {
            $contact->copyright_img = '/storage/' . $filePath;
        }

    }
    if ($request->hasFile('payment_receipt')) {
        $fileName =  $request->file('payment_receipt')->getClientOriginalName();
        $filePath = $request->file('payment_receipt')->storeAs('uploads/banners', $fileName, 'public');
        if (env('ASSET_URL')) {
            $contact->payment_img = env('ASSET_URL').'/storage/' . $filePath;
        } else {
            $contact->payment_img= '/storage/' . $filePath;
        }

    }



        $contact->save();

        return redirect()->back()->with('success', 'Submit Successfully. We will connect as soon as possible!');

}



    public function show($id)
    {
        $trainingEvents = Branch::where('category_id', $id)->get();


        return view('frontend.show', compact('trainingEvents'));
    }




    public function edit($id)
    {
        $paper = Paper::findOrFail(decrypt($id));

        return view('backend.submitpaper.edit', compact( 'paper'));
    }




    public function update(Request $request, $id)
    {

    $validated = $request->validate([
        'author_name'       => 'nullable|string|max:255',
        'country'           => 'nullable|string|max:255',
        'email'             => 'nullable|email|max:255',
        'co_authors'        => 'nullable|string|max:255',
        'phone'             => 'nullable|string|max:20',
        'address'           => 'nullable|string|max:255',
        'paper_id'          => 'nullable|string|max:100',
        'paper_title'       => 'nullable|string|max:255',
        'journal_name'      => 'nullable|string|max:255',
        'manuscript'        => 'nullable|file|mimes:doc,docx,|max:2048',
        'copyright'         => 'nullable|file|mimes:pdf|max:2048',
        'payment_receipt'   => 'nullable|file|mimes:pdf|max:2048',
    ]);

    $paper = Paper::findOrFail(decrypt($id));

    $paper->author_name   = $request->author_name;
    $paper->country       = $request->country;
    $paper->email         = $request->email;
    $paper->co_authors    = $request->co_authors;
    $paper->phone         = $request->phone;
    $paper->address       = $request->address;
    $paper->paper_id      = $request->paper_id;
    $paper->paper_title   = $request->paper_title;
    $paper->journal_name  = $request->journal_name;




    if ($request->hasFile('manuscript_img')) {

        if ($paper->manuscript_img) {
            Storage::disk('public')->delete(str_replace('/public/storage/', '', $paper->manuscript_img));
        }
        $fileName =  $request->file('manuscript_img')->getClientOriginalName();
        $filePath = $request->file('manuscript_img')->storeAs('uploads/banners', $fileName, 'public');
        if (env('ASSET_URL')) {
            $paper->manuscript_img = env('ASSET_URL').'/storage/' . $filePath;
        } else {
            $paper->manuscript_img = '/storage/' . $filePath;
        };
    }


    if ($request->hasFile('copyright_img') && $request->file('copyright_img')->isValid()) {

        if ($paper->copyright_img) {
            Storage::disk('public')->delete(str_replace('/public/storage/', '', $paper->copyright_img));
        }
        $fileName =  $request->file('copyright_img')->getClientOriginalName();
        $filePath = $request->file('copyright_img')->storeAs('uploads/banners', $fileName, 'public');
        if (env('ASSET_URL')) {
            $paper->copyright_img = env('ASSET_URL').'/storage/' . $filePath;
        } else {
            $paper->copyright_img = '/storage/' . $filePath;
        };

    }


    if ($request->hasFile('payment_img') && $request->file('payment_img')->isValid()) {

        if ($paper->payment_img) {
            Storage::disk('public')->delete(str_replace('/public/storage/', '', $paper->payment_img));
        }

        $fileName =  $request->file('payment_img')->getClientOriginalName();
        $filePath = $request->file('payment_img')->storeAs('uploads/banners', $fileName, 'public');
        if (env('ASSET_URL')) {
            $paper->payment_img = env('ASSET_URL').'/storage/' . $filePath;
        } else {
            $paper->payment_img= '/storage/' . $filePath;
        }
    }


    $paper->save();

    return redirect()->back()->with('success', 'Paper updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {


        Paper::findOrFail(decrypt($id))->delete();
        Artisan::call('cache:clear');
        return back()->with('success', 'Branch deleted successfully.');
    }
}
