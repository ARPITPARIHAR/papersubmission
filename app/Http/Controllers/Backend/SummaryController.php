<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paper;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PaperExport;

class SummaryController extends Controller
{
    public function index()
    {
        $papers = Paper::paginate(5);
        return view('backend.papersummary.index', compact('papers'));
    }



    public function exportToCSV()
    {
        return Excel::download(new PaperExport, 'papers.csv');
    }
}
