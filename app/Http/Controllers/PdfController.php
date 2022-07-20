<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use PDF;
//use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class PdfController extends Controller
{
    public function pdf()
    {
        $data = array(
            ['name'=>'susan'],
            ['name'=>'debbie'],
            ['name'=>'irene'],
        );
        $pdf=PDF::loadView('pdf.test',$data);
        return $pdf->stream('test.pdf');
    }

}
