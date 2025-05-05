<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trainingevent;

class EventController extends Controller
{
    public function index(Request $request)
    {
        // Retrieve search query and month filter
        $query = $request->input('search');
        $month = $request->input('month');

        // Query builder for Trainingevent
        $trainingevents = Trainingevent::query();

        // Apply search filter if query exists
        if ($query) {
            $trainingevents->where('title', 'LIKE', "%{$query}%");
        }

        // Apply month filter if month is selected
        if ($month) {
            $trainingevents->where('start_date', 'LIKE', "%{$month}%");
        }

        // Retrieve filtered results
        $trainingevents = $trainingevents->get();

        return view('frontend.traningprogramme', compact('trainingevents'));
    }
}
