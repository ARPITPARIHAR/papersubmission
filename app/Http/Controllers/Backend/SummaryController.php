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



    // public function exportToCSV()
    // {
    //     return Excel::download(new PaperExport, 'papers.csv');
    // }


    public function exportSelected(Request $request)
    {
        $paperIds = $request->input('paper_ids');

        if (!$paperIds || count($paperIds) == 0) {
            return back()->with('error', 'Please select at least one paper to export.');
        }

        $papers = Paper::whereIn('id', $paperIds)->get();

        $filename = 'selected_papers.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function () use ($papers) {
            $file = fopen('php://output', 'w');
            // CSV Header Row
            fputcsv($file, ['Author Name', 'Country', 'Paper Title', 'Journal Name', 'Paper ID','Payment_Receipt',  'Amount']);

            foreach ($papers as $paper) {
                fputcsv($file, [
                    $paper->author_name,
                    $paper->country,
                    $paper->paper_title,
                    $paper->journal_name,
                    $paper->paper_id,
                    url($paper->payment_img),
                   
                    $paper->amount . ' ' . $paper->currency,
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
