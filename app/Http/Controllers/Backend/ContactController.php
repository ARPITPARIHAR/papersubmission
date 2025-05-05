<?php

namespace App\Http\Controllers\Backend;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{


    public function index()
    {
        $contacts = Contact::paginate(5); // Example: Paginate with 10 contacts per page

        return view('backend.contact.index', compact('contacts'));
    }

    public function delete(Request $request, $id)
    {
        $contact = Contact::find(decrypt($id));

        if (!$contact) {
            return redirect()->back()->with('error', 'Contact not found.');
        }

        $contact->delete();

        return redirect()->route('contact.index')->with('success', 'Contact deleted successfully.');
    }


}
