<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\Models\Paper;

class PaperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $papers = Paper::paginate(5);
        return view('backend.paper.index', compact('papers'));
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
        $contact->amount = $request->amount;
         $contact->currency = $request->currency;


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

public function publish(Request $request, $id)
    {
        // Validate the URL input
        $validatedData = $request->validate([
            'publishing_url' => 'required|url',
        ]);

        // Find the contact by ID
        $contact = Paper::findOrFail($id);

        // Store the publishing URL in the database
        $contact->publishing_url = $validatedData['publishing_url'];
        $contact->published_by = auth()->user()->name;
        $contact->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'URL published successfully!');
    }
    public function destroy($id)
    {
        Paper::findOrFail(decrypt($id))->delete();
        Artisan::call('cache:clear');
        return back()->with('success', 'Page deleted successfully.');
    }
}
