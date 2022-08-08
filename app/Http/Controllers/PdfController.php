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
        set_time_limit(800);
        $data = array(
            ['name'=>'susan'],
            ['name'=>'debbie'],
            ['name'=>'irene'],
        );
        //return view('/pdf/test');
        // $pdf=PDF::loadView('pdf.test',$data);
        // return $pdf->stream('test.pdf');
        $pdf=PDF::loadHTML('
            <head>
                <meta http-equiv="Content-Type" content="text/html"; charset=utf-8/>
            </head>
            <body>
                <h1>ทดสอบ</h1>
                <p>test<p>
            </body>
        ');
        return $pdf->stream('test.pdf');
    }

}
