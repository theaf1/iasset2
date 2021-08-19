<?php

namespace App\Http\Controllers;
use App\Models\LooseDisplay;
use App\Models\Owner;
use App\Models\Section;
use App\Models\Asset_statuses;
use App\Models\Asset_use_statuses;
use App\Models\Position;
use App\Models\DisplayType;
use App\Models\DisplayRatio;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LooseDisplayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $LooseDisplays = $this->filterLooseDisplay(request()->section_filter,request()->per_page); //รวบรวมข้อมูลแบ่งตามหน่วยงานและแบ่งหน้า
        //แปลงปี คศ ให้เป็น พศ
        foreach ($LooseDisplays as $LooseDisplay)
        {
            $LooseDisplay_upd_eng = $LooseDisplay->updated_at->locale('th-th')->isoFormat('Do MMMM YYYY');
            $LooseDisplay_upd_ex = explode(' ', $LooseDisplay_upd_eng);
            $LooseDisplay_upd_year_th = (int)$LooseDisplay_upd_ex[2]+543;
            $LooseDisplay_upd_year = $LooseDisplay_upd_ex[0].' '.$LooseDisplay_upd_ex[1].' '.$LooseDisplay_upd_year_th;
            $LooseDisplay->update_date = $LooseDisplay_upd_year;
        }
        //เรียกหน้า loosedisplayindex พร้อมกับส่งตัวแปร
        return view('loosedisplayindex')->with([
            'sections'=>Section::all(),
            'loosedisplays'=>$LooseDisplays,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //เรียกหน้า addloosedisplay พร้อมกับส่งตัวแปร
        $lastInternalSapId = LooseDisplay::where('sapid', 'like', 'MED%')->orderBy('id', 'Desc')->first();
        
        if($lastInternalSapId == null)
        {
            $temp = 0;
        }
        else
        {
            $temp = $lastInternalSapId->sapid;
        }

        return view('addloosedisplay')->with([
            'owners'=>Owner::all(),
            'sections'=>Section::all(),
            'asset_statuses'=>Asset_statuses::all(),
            'asset_use_statuses'=>Asset_use_statuses::all(),
            'positions'=>Position::all(),
            'displayratios'=>DisplayRatio::all(),
            'displaytypes'=>DisplayType::all(),
            'lastinternalsap'=>$temp,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateData($request); //ตรวจสอบข้อมูลก่อนบันทึก
        $LooseDisplay = LooseDisplay::create($request->all()); //เขียนข้อมูลงในฐานข้อมูล
        return redirect()->back()->with('success','บันทึกข้อมูลสำเร็จแล้ว'); //รายงานผลการบันทึกข้อมูล
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $LooseDisplay = LooseDisplay::find($id); //ค้นหาข้อมูล
        //เรียกหน้า loosedisplaydetail พ้อมกับส่งตัวแปร
        return view('loosedisplaydetail')->with([
            'loosedisplay'=>$LooseDisplay,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $LooseDisplay = LooseDisplay::find($id); //ค้นหาข้อมูล
        //เรียกหน้า editloosedisplay พร้อมกับส่งตัวแปร
        return view('editloosedisplay')->with([
            'owners'=>Owner::all(),
            'sections'=>Section::all(),
            'asset_statuses'=>Asset_statuses::all(),
            'asset_use_statuses'=>Asset_use_statuses::all(),
            'positions'=>Position::all(),
            'displaytypes'=>DisplayType::all(),
            'displayratios'=>DisplayRatio::all(),
            'loosedisplay'=>$LooseDisplay,
        ]);
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
        $this->validateData($request); //ตรวจสอบข้อมูลก่อนการแก้ไข
        LooseDisplay::find($id)->update($request->all()); //แก้ไขข้อมูลในฐานข้อมูล
        return redirect('/loosedisplay')->with('success','แก้ไขข้อมูลสำเร็จ'); //รายงานผลการแก้ไขข้อมูล
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
    private function validateData ($data) //ตรวจสอบข้อมูล
    {
        //เงิ่อนไข
        $rules = [
            'sapid'=>'required',
            'location_id'=>'required',
            'section_id'=>'required',
            'response_person'=>'required',
            'position_id'=>'required',
            'tel_no'=>'required',
            'asset_status_id'=>'required',
            'asset_use_status_id'=>'required',
            'brand'=>'required',
            'model'=>'required',
            'serial_no'=>'required',
            'display_type_id'=>'required',
            'display_size'=>'required',
            'display_ratio_id'=>'required',
        ];

        //ข้อความแจ้งเตือน
        $messages = [
            'sapid.required'=>'กรุณาตรวจสอบรหัส SAP',
            'location_id.required'=>'กรุณาระบุสถานที่ตั้งเครื่อง',
            'section_id.required'=>'กรุณาระบุหน่วยงาน',
            'response_person.required'=>'กรุณาระบุชื่อผู้รับผิดชอบ',
            'position_id.required'=>'กรุณาระบุตำแหน่งผู้รับผิดชอบ',
            'tel_no.required'=>'กรุณาระบุหมายเลขโทรศัพท์',
            'asset_status_id.required'=>'กรุณาระบุสถานะของครุภัณฑ์',
            'asset_use_status_id.required'=>'กรุณาระบุสถานะการใช้งานของครุภัณฑ์',
            'brand.required'=>'กรุณาระบุยี่ห้อ',
            'model.required'=>'กรุณาระบุรุ่น',
            'serial_no.required'=>'กรุณาระบุ serial number',
            'display_type_id.required'=>'กรุณาระบุชนิดของจอภาพ',
            'display_size.required'=>'กรุณาระบุขนาดจอภาพ',
            'display_ratio_id.required'=>'กรุณาระบุสัดส่วนภาพ',
        ];

        return $this->validate($data, $rules, $messages);
    }
    protected function filterLooseDisplay ($section_filter, $per_page) //รวมข้อมูลแล้วแบ่งหน้า
    {
        return LooseDisplay::where('section_id',$section_filter)->paginate($per_page)->withQueryString([
            'section_filter'=>$section_filter,
            'per_page'=>$per_page,
        ]);
    }
}
