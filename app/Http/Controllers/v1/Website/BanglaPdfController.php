<?php

namespace App\Http\Controllers\v1\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use mPDF as PDF;

use App\Services\Pdf\PdfService;

class BanglaPdfController extends Controller
{
    
    public function showBanglaPdf(){
        $data["paragraphContent"] = (new PdfService())->getPdfContents();

        $pdf = PDF::loadView('pdf.pdf-view', $data);

        return $pdf->stream('YourPdfRename.pdf');
    }
}
