<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactUsMail;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Form validation
  

        // New Contact Entry
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->subject = $request->subject;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();

        // Send email
        // Mail::to('parihararpiy@gmail.com')->send(new ContactUsMail($contact));

        return redirect()->back()->with([
            'success' => 'Message sent successfully!',
            'flash_image' => asset('assets/img/thanku.jpeg'),
        ]);
    }
}
