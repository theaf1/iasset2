<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use PDF;
use Carbon\Carbon;

class PdfController extends Controller
{
    public function pdf()
    {
        $Client = Client::all();
        $Now_eng = Carbon::Now()->locale('th-th')->isoFormat('Do MMMM YYYY'); //อ่านค่าเวลาปัจจุบันแล้วจัดให้อยูในรูปแบบ วันที่-เดือน-คศ
        $Now_ex = explode(' ', $Now_eng); //แยกส่วนวันที่
        $Year_th = (int)$Now_ex[2]+543; //แปลง คศ. ให้เป็น พศ.
        $Now =  $Now_ex[0].' '.$Now_ex[1].' '.$Year_th; //รวมวันที่ในรูปแแบบ วันที่-เดือน-พศ
        $pdf = PDF::LoadView('clientreportsection',['clients'=>$Client,'now'=>$Now]);
        return @$pdf->stream();
    }

}
