<?php

namespace App\Http\Controllers;

use App\Models\Paper;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    public function store(Request $request)
    {




       $contact = new Job();
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
        $fileName = time() . '-manuscript-' . $request->file('manuscript')->getClientOriginalName();
        $filePath = $request->file('manuscript')->storeAs('uploads/banners', $fileName, 'public');
        $contact->manuscript_img = '/public/storage/' . $filePath;
    }
    if ($request->hasFile('copyright')) {
        $fileName = time() . '-copyright-' . $request->file('copyright')->getClientOriginalName();
        $filePath = $request->file('copyright')->storeAs('uploads/banners', $fileName, 'public');
        $contact->copyright_img = '/public/storage/' . $filePath;
    }
    if ($request->hasFile('payment_receipt')) {
        $fileName = time() . '-payment_receipt-' . $request->file('payment_receipt')->getClientOriginalName();
        $filePath = $request->file('payment_receipt')->storeAs('uploads/banners', $fileName, 'public');
        $contact->payment_img = '/public/storage/' . $filePath;
    }


        $contact->save();


        return redirect()->back()->with('success', 'We will Connect As Soon!');
}

}
