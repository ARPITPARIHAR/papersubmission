<?php

namespace App\Exports;

use App\Models\Paper;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PaperExport implements FromQuery, WithHeadings, WithMapping
{
    public function query()
    {
        return Paper::query()
            ->select('author_name', 'country', 'paper_title', 'journal_name','paper_id',  'payment_img', 'amount', 'currency');  // Fetching necessary columns
    }

    public function headings(): array
    {
        return [
            'Serial Number',    // Heading for Serial Number
            'Author Name',      // Heading for author_name
            'Country',          // Heading for country
            'Paper Title',      // Heading for paper_title
            'Journal Name',
            'Ppaer Id',      // Heading for journal_name
            'Payment Receipt',  // Heading for payment_img (showing file name)
            'Amount'            // Heading for amount with currency
        ];
    }

    public function map($paper): array
    {
        static $serialNumber = 1;  // Static variable to increment serial number

        // Get the basename (file name) of the payment receipt
        $paymentReceipt = $paper->payment_img ? basename($paper->payment_img) : 'No File';

        return [
            $serialNumber++,  // Serial Number
            $paper->author_name,
            $paper->country,
            $paper->paper_title,
            $paper->journal_name,
            $paper->paper_id,
            $paymentReceipt,  // Just the file name of the payment receipt
            $paper->amount . ' ' . $paper->currency  // Showing amount with currency
        ];
    }
}
