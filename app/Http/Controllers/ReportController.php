<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Client;
use App\Peripherals;
use App\Storageperipherals;
use App\Servers;
use App\Networkdevices;
use App\Networkedstorage;
use App\Upses;
use App\Section;
use Carbon\Carbon;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //กำหนค่าตัวแปรที่ใช้ในหน้า reports
    {
        $Sections = Section::all();
        $Reports = array(
            ['id'=>'1', 'name'=>'รายงานจำนวนครุภัณฑ์คอมพิวเตอร์ทั้งหมด'],
            ['id'=>'2', 'name'=>'รายงานจำนวนครุภัณฑ์คอมพิวเตอร์และอุปกรณ์ต่อพ่วงรายหน่วยงาน'],
            ['id'=>'3', 'name'=>'รายงานจำนวนครุภัณฑ์คอมพิวเตอร์ที่มีอายุมากกว่าที่กำหนด'],
            ['id'=>'4', 'name'=>'บัญชีครุภัณฑ์คอมพิวเตอร์ประจำหน่วยงาน'],
            ['id'=>'5', 'name'=>'บัญชีครุภัณฑ์อุปกรณ์ต่อพ่วงประจำหน่วยงาน'],
            ['id'=>'6', 'name'=>'บัญชีครุภัณฑ์อุปกรณ์ต่อพ่วงเก็บข้อมูลประจำหน่วยงาน'],
            ['id'=>'7', 'name'=>'บัญชีครุภัณฑ์คอมพิวเตอร์แม่ข่ายประจำหน่วยงาน'],
            ['id'=>'8', 'name'=>'บัญชีครุภัณฑ์อุปกรณ์เครือข่ายคอมพิวเตอร์ประจำหน่วยงาน'],
            ['id'=>'9', 'name'=>'บัญชีครุภัณฑ์อุปกรณ์เก็บข้อมูลเครือข่ายประจำหน่วยงาน'],
            ['id'=>'10', 'name'=>'บัญชีครุภัณฑ์เครื่องสำรองไฟฟ้าประจำหน่วยงาน'],
        );
        //ส่งค่าตัวแปรไปยังหน้า reports
        return view('reports')->with([
            'sections'=>$Sections,
            'reporttypes'=>$Reports,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function report(Request $request) //ออกรายงานตามที่ต้องการ
    {
        if($request->report_id ==1) //ออกรายงานจำนวนครุภัณฑ์ทั้งหมด
        {
            $Client_Results = Client::all()->count(); //นับจำนวนคอมพิวเตอร์
            $Peripherals_Results = Peripherals::all()->count(); //นับจำนวนอุปกรณ์ต่อพ่วง
            $Storageperipherals_Results = Storageperipherals::all()->count(); //นับจำนวนอุปกรณ์เก็บข้อมูล
            $Servers_Results = Servers::all()->count(); //นับคอมพิวเตอร์แม่ข่าย
            $Networkdevice_Results = Networkdevices::all()->count(); //นับอุปกรณ์เครือข่าย
            $Networkedstorage_Results = Networkedstorage::all()->count(); //นับอุปกรณ์เก็บข้อมูลเครือข่าย
            $Upses_Results = Upses::all()->count(); //นับเครื่องสำรองไฟฟ้า
            $Now_eng = Carbon::Now()->locale('th-th')->isoFormat('Do MMMM YYYY'); //อ่านค่าเวลาปัจจุบันแล้วจัดให้อยูในรูปแบบ วันที่-เดือน-คศ
            $Now_ex = explode(' ', $Now_eng); //แยกส่วนวันที่
            $Year_th = (int)$Now_ex[2]+543; //แปลง คศ. ให้เป็น พศ.
            $Now =  $Now_ex[0].' '.$Now_ex[1].' '.$Year_th; //รวมวันที่ในรูปแแบบ วันที่-เดือน-พศ
            
            //ส่งค่าไปแสดงผล
            return view('total_report')->with([
                'client'=>$Client_Results,
                'peripherals'=>$Peripherals_Results,
                'storageperipheral'=>$Storageperipherals_Results,
                'servers'=>$Servers_Results,
                'networkdevices'=>$Networkdevice_Results,
                'networkedstorage'=>$Networkedstorage_Results,
                'upses'=>$Upses_Results,
                'now'=>$Now,
            ]);
        }
        if($request->report_id ==2) //ออกรายงานจำนวนครุภัณฑ์รายหน่วยงาน
        {
            $Client_Results = Client::where('section_id',$request->report_section)->count(); //นับจำนวนคอมพิวเตอร์
            $Peripherals_Results = Peripherals::where('section_id',$request->report_section)->count(); //นับจำนวนอุปกรณ์ต่อพ่วง
            $Storageperipherals_Results = Storageperipherals::where('section_id',$request->report_section)->count(); //นับจำนวนอุปกรณ์เก็บข้อมูล
            $Servers_Results = Servers::where('section_id',$request->report_section)->count(); //นับคอมพิวเตอร์แม่ข่าย
            $Networkdevice_Results = Networkdevices::where('section_id',$request->report_section)->count(); //นับอุปกรณ์เครือข่าย
            $Networkedstorage_Results = Networkedstorage::where('section_id',$request->report_section)->count(); //นับอุปกรณ์เก็บข้อมูลเครือข่าย
            $Upses_Results = Upses::where('section_id',$request->report_section)->count(); //นับเครื่องสำรองไฟฟ้า
            $Now_eng = Carbon::Now()->locale('th-th')->isoFormat('Do MMMM YYYY'); //อ่านค่าเวลาปัจจุบันแล้วจัดให้อยูในรูปแบบ วันที่-เดือน-คศ
            $Now_ex = explode(' ', $Now_eng); //แยกส่วนวันที่
            $Year_th = (int)$Now_ex[2]+543; //แปลง คศ. ให้เป็น พศ.
            $Now =  $Now_ex[0].' '.$Now_ex[1].' '.$Year_th; //รวมวันที่ในรูปแแบบ วันที่-เดือน-พศ
            $Section = Section::where('id',$request->report_section)->get(); //อ่านค่าหน่วยงาน

            //ส่งค่าไปแสดงผล
            return view('section_report')->with([
                'section'=>$Section,
                'client'=>$Client_Results,
                'peripherals'=>$Peripherals_Results,
                'storageperipheral'=>$Storageperipherals_Results,
                'servers'=>$Servers_Results,
                'networkdevices'=>$Networkdevice_Results,
                'networkedstorage'=>$Networkedstorage_Results,
                'upses'=>$Upses_Results,
                'now'=>$Now,
            ]);
        }
        if ($request->report_id ==3)
        {
            
            $Now_eng = Carbon::Now()->locale('th-th')->isoFormat('Do MMMM YYYY'); //อ่านค่าเวลาปัจจุบันแล้วจัดให้อยูในรูปแบบ วันที่-เดือน-คศ
            $Now_ex = explode(' ', $Now_eng); //แยกส่วนวันที่
            $Year_th = (int)$Now_ex[2]+543; //แปลง คศ. ให้เป็น พศ.
            $Now =  $Now_ex[0].' '.$Now_ex[1].' '.$Year_th; //รวมวันที่ในรูปแแบบ วันที่-เดือน-พศ
            $Cutoff_date = Carbon::Now();
            return view('x')->with([
                'now'=>$Now,
            ]);
        }

        if ($request->report_id ==4) //บัญชีคอมพิวเตอร์ประจำหน่วยงาน
        {
            $Client_Results = Client::where('section_id',$request->report_section)->get(); //รวบรวมเครื่องคอมพิวเตอร์
            $Now_eng = Carbon::Now()->locale('th-th')->isoFormat('Do MMMM YYYY'); //อ่านค่าเวลาปัจจุบันแล้วจัดให้อยูในรูปแบบ วันที่-เดือน-คศ
            $Now_ex = explode(' ', $Now_eng); //แยกส่วนวันที่
            $Year_th = (int)$Now_ex[2]+543; //แปลง คศ. ให้เป็น พศ.
            $Now =  $Now_ex[0].' '.$Now_ex[1].' '.$Year_th; //รวมวันที่ในรูปแแบบ วันที่-เดือน-พศ

            //ส่งค่าไปแสดงผล
            return view('clientreportsection')->with([
                'clients'=>$Client_Results,
                'now'=>$Now,
            ]);
        }
        if ($request->report_id ==5) //บัญชีอุปกรณ์ต่อพ่วงรายหน่วยงาน
        {
            $Peripherals_Results = Peripherals::where('section_id',$request->report_section)->get(); //รวบรวมอุปกรณ์ต่อพ่วง
            $Now_eng = Carbon::Now()->locale('th-th')->isoFormat('Do MMMM YYYY'); //อ่านค่าเวลาปัจจุบันแล้วจัดให้อยูในรูปแบบ วันที่-เดือน-คศ
            $Now_ex = explode(' ', $Now_eng); //แยกส่วนวันที่
            $Year_th = (int)$Now_ex[2]+543; //แปลง คศ. ให้เป็น พศ.
            $Now =  $Now_ex[0].' '.$Now_ex[1].' '.$Year_th; //รวมวันที่ในรูปแแบบ วันที่-เดือน-พศ

            //ส่งค่าไปแสดงผล
            return view('peripheralsreportsection')->with([
                'peripherals'=>$Peripherals_Results,
                'now'=>$Now,
            ]);
        }
        if ($request->report_id ==6) //บัญชีอุปกรณ์ต่อพ่วงเก็บข้อมูลรายหน่วยงาน
        {
            $Storageperipherals_Results = Storageperipherals::where('section_id',$request->report_section)->get(); //รวบรวมอุปกรณ์ต่อพ่วงเก็บข้อมูล
            $Now_eng = Carbon::Now()->locale('th-th')->isoFormat('Do MMMM YYYY'); //อ่านค่าเวลาปัจจุบันแล้วจัดให้อยูในรูปแบบ วันที่-เดือน-คศ
            $Now_ex = explode(' ', $Now_eng); //แยกส่วนวันที่
            $Year_th = (int)$Now_ex[2]+543; //แปลง คศ. ให้เป็น พศ.
            $Now =  $Now_ex[0].' '.$Now_ex[1].' '.$Year_th;//รวมวันที่ในรูปแแบบ วันที่-เดือน-พศ

            //ส่งค่าไปแสดงผล
            return view('storageperipheralreportsection')->with([
                'storageperipherals'=>$Storageperipherals_Results,
                'now'=>$Now,
            ]);
        }
        if ($request->report_id ==7) //บัญชีคอมพิวเตอร์แม่ข่ายรายหน่วยงาน
        {
            $Servers_Results = Servers::where('section_id', $request->report_section)->get(); //รวบรวมคอมพิวเตอร์แม่ข่าย
            $Now_eng = Carbon::Now()->locale('th-th')->isoFormat('Do MMMM YYYY'); //อ่านค่าเวลาปัจจุบันแล้วจัดให้อยูในรูปแบบ วันที่-เดือน-คศ
            $Now_ex = explode(' ', $Now_eng); //แยกส่วนวันที่
            $Year_th = (int)$Now_ex[2]+543; //แปลง คศ. ให้เป็น พศ.
            $Now =  $Now_ex[0].' '.$Now_ex[1].' '.$Year_th; //รวมวันที่ในรูปแแบบ วันที่-เดือน-พศ

            //ส่งค่าไปแสดงผล
            return view('serverreportsection')->with([
                'servers'=>$Servers_Results,
                'now'=>$Now,
            ]);
        }
        if ($request->report_id ==8) //บัญชีอุปกรณ์เครือข่ายรายหน่วยงาน
        {
            $Networkdevice_Results = Networkdevices::where('section_id', $request->report_section)->get(); //รวบรวมอุปกรณเครือข่าย
            $Now_eng = Carbon::Now()->locale('th-th')->isoFormat('Do MMMM YYYY'); //อ่านค่าเวลาปัจจุบันแล้วจัดให้อยูในรูปแบบ วันที่-เดือน-คศ
            $Now_ex = explode(' ', $Now_eng); //แยกส่วนวันที่
            $Year_th = (int)$Now_ex[2]+543; //แปลง คศ. ให้เป็น พศ.
            $Now =  $Now_ex[0].' '.$Now_ex[1].' '.$Year_th; //รวมวันที่ในรูปแแบบ วันที่-เดือน-พศ

            //ส่งค่าไปแสดงผล
            return view('networkdevicereportsection')->with([
                'networkdevices'=>$Networkdevice_Results,
                'now'=>$Now,
            ]);
        }
        if ($request->report_id ==9) //บัญชีอุปกรณเก็บข้อมูลเครือข่ายรายหน่วยงาน
        {
            $Networkedstorage_Results =Networkedstorage::where('section_id', $request->report_section)->get(); //รวบรวมอุปกรณ์เก็บข้อมูลเครือข่าย
            $Now_eng = Carbon::Now()->locale('th-th')->isoFormat('Do MMMM YYYY'); //อ่านค่าเวลาปัจจุบันแล้วจัดให้อยูในรูปแบบ วันที่-เดือน-คศ
            $Now_ex = explode(' ', $Now_eng); //แยกส่วนวันที่
            $Year_th = (int)$Now_ex[2]+543; //แปลง คศ. ให้เป็น พศ.
            $Now =  $Now_ex[0].' '.$Now_ex[1].' '.$Year_th; //รวมวันที่ในรูปแแบบ วันที่-เดือน-พศ

            //ส่งค่าไปแสดงผล
            return view('networkedstoragereportsection')->with([
                'networkedstorages'=>$Networkedstorage_Results,
                'now'=>$Now,
            ]);
        }
        if ($request->report_id ==10) //บัญชีเครื่องสำรองไฟฟ้ารายหน่วยงาน
        {
            $Upses_Results = Upses::where('section_id', $request->report_section)->get(); //รวบรวมเครื่องสำรองไฟฟ้า
            $Now_eng = Carbon::Now()->locale('th-th')->isoFormat('Do MMMM YYYY'); //อ่านค่าเวลาปัจจุบันแล้วจัดให้อยูในรูปแบบ วันที่-เดือน-คศ
            $Now_ex = explode(' ', $Now_eng); //แยกส่วนวันที่
            $Year_th = (int)$Now_ex[2]+543; //แปลง คศ. ให้เป็น พศ.
            $Now =  $Now_ex[0].' '.$Now_ex[1].' '.$Year_th; //รวมวันที่ในรูปแแบบ วันที่-เดือน-พศ

            //ส่งค่าไปแสดงผล
            return view('upsreportsection')->with([
                'upses'=>$Upses_Results,
                'now'=>$Now,
            ]);
        }
    }
}
