<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class FileDownloadController extends Controller
{
    public function download($fileName)
    {
        // Path relative to storage/app/public
        $filePath = 'uploads/' . $fileName;

        // Check if the file exists
        if (Storage::disk('public')->exists($filePath)) {
            $file = Storage::disk('public')->path($filePath);
            return Response::download($file, $fileName, [
                'Content-Type' => 'application/pdf',
            ]);
        } else {
            abort(404, 'File not found');
        }
    }
}
