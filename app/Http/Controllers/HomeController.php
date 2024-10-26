<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PdfService;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf as PDF;
use Mpdf\MpdfException;

class HomeController extends Controller
{
    public function pdfGenerate()
    {
        $data["paragraphContent"] = (new PdfService())->getPdfContents();

        $pdf = PDF::loadView('pdf.pdf-read', $data);

        return $pdf->stream('mypdf.pdf');
    }
}
