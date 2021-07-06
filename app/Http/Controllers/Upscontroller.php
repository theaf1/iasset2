<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset_statuses;
use App\Asset_use_statuses;
use App\Section;
use App\Owner;
use App\Mobility;
use App\Upses;
use App\Upsbatterytype;
use App\Formfactor;
use App\Topology;
use Carbon\Carbon;

class UpsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        //รายการตัวแปรที่ใช้ในการแสดงบัญชีเครื่องสำรองไฟฟ้า
        $Upses = $this->filterUps(request()->section_filter,request()->per_page);
        foreach ($Upses as $Ups) //เปลี่ยนวันที่แก้ไขข้อมูลใหัอยู่ในรูปแบบ ว-ด-ป
        {
            $ups_upd_eng = $Ups->updated_at->locale('th-th')->isoFormat('Do MMMM YYYY');
            $ups_upd_ex = explode(' ', $ups_upd_eng);
            $ups_upd_year_th = (int)$ups_upd_ex[2]+543;
            $ups_upd_year = $ups_upd_ex[0].' '.$ups_upd_ex[1].' '.$ups_upd_year_th;
            $Ups->update_date = $ups_upd_year;
        }

        return view('UpsIndex')->with([
            'upses'=>$Upses,
            'sections'=>Section::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //ตัวแปรที่ใช้ในการสร้างข้อมูลเครื่องสำรองไฟฟ้า
        $Asset_statuses = Asset_statuses::all();
        $Asset_use_statuses = Asset_use_statuses::all();
        $Sections = Section::all();
        $Owners = Owner::all();
        $Forms = Formfactor::all();
        $Topos = Topology::all();
        $Modular = array(
            ['id'=>'1', 'value'=>'0', 'name'=>'ไม่ได้'],
            ['id'=>'2', 'value'=>'1', 'name'=>'ได้'],
        );
        $Bat_type = Upsbatterytype::all();
        $ExBat = array(
            ['id'=>'1', 'value'=>'0', 'name'=>'ไม่มี'],
            ['id'=>'2', 'value'=>'1', 'name'=>'มี'],
        );
        $Mobility = Mobility::all();
        $lastInternalSapId = Upses::where('sapid', 'like', 'MED%')->orderBy('id', 'Desc')->first();
         
        if($lastInternalSapId == null)
        {
            $temp = 0;
        }
        else
        {
            $temp = $lastInternalSapId->sapid;
        }
 
        //ตัวแปรที่ส่งไปยังหน้า addups
        return view('addups')->with([
            'asset_statuses'=>$Asset_statuses,
            'asset_use_statuses'=>$Asset_use_statuses,
            'sections'=>$Sections,
            'owners'=>$Owners,
            'forms'=>$Forms,
            'topos'=>$Topos,
            'modulars'=>$Modular,
            'bat_types'=>$Bat_type,
            'exbats'=>$ExBat,
            'mobiles'=>$Mobility,
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
        //return $request->all();
        $this->validateData($request); //ตรวจสอบข้อมูลที่ได้รับ

        $Upses = Upses::create($request->all()); //เขียนข้อมูลลงในตาราง upses
        return redirect()->back()->with('success','บันทึกข้อมูลเรียบร้อยแล้ว'); //แจ้งผลการบันทึกข้อมูล
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //ตัวแปรที่ใช้ในการแสดงผลรายละเอียดเครื่องสำรองไฟฟ้า
        $Ups = Upses::find($id);
        $Asset_statuses = Asset_statuses::all();
        $Asset_use_statuses = Asset_use_statuses::all();
        $Sections = Section::all();
        $Owners = Owner::all();
        $Forms = Formfactor::all();
        $Topos = Topology::all();
        $Modular = array(
            ['id'=>'1', 'value'=>'0', 'name'=>'ไม่ได้'],
            ['id'=>'2', 'value'=>'1', 'name'=>'ได้'],
        );
        $Bat_type = Upsbatterytype::all();
        $ExBat = array(
            ['id'=>'1', 'value'=>'0', 'name'=>'ไม่มี'],
            ['id'=>'2', 'value'=>'1', 'name'=>'มี'],
        );
        $Mobility = Mobility::all();

        //ตัวแปรที่ส่งกลับไปยังหน้า Upsdetail
        return view('Upsdetail')->with([
            'ups'=>$Ups,
            'asset_statuses'=>$Asset_statuses,
            'asset_use_statuses'=>$Asset_use_statuses,
            'sections'=>$Sections,
            'owners'=>$Owners,
            'forms'=>$Forms,
            'topos'=>$Topos,
            'modulars'=>$Modular,
            'bat_types'=>$Bat_type,
            'exbats'=>$ExBat,
            'mobiles'=>$Mobility,
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
        //รายการตัวแปรที่ใช้ในการแก้ไขข้อมูลเครื่องสำรองไฟฟ้า
        $Forms = Formfactor::all();
        $Topos = Topology::all();
        $Modular = array(
            ['id'=>'1', 'value'=>'0', 'name'=>'ไม่ได้'],
            ['id'=>'2', 'value'=>'1', 'name'=>'ได้'],
        );
        $Bat_type = Upsbatterytype::all();
        $ExBat = array(
            ['id'=>'1', 'value'=>'0', 'name'=>'ไม่มี'],
            ['id'=>'2', 'value'=>'1', 'name'=>'มี'],
        );
        $Mobility = Mobility::all();

        $ups = Upses::find($id);

        //ตัวแปรที่ส่งกลับไปยังหน้า editups
        return view('editups')->with([
            'ups'=>$ups,
            'sections'=>Section::all(),
            'owners'=>Owner::all(),
            'asset_statuses'=>Asset_statuses::all(),
            'asset_use_statuses'=>Asset_use_statuses::all(),
            'forms'=>$Forms,
            'topos'=>$Topos,
            'modulars'=>$Modular,
            'bat_types'=>$Bat_type,
            'exbats'=>$ExBat,
            'mobiles'=>$Mobility,

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
        $this->validateData($request); //ตรวจสอบข้อมูลที่จะแก้ไข
        Upses::find($id)->update($request->all()); //ค้นหาและแก้ไขข้อมูล
        return redirect('/upses')->with('success','แก้ไขข้อมูลเรียบร้อยแล้ว'); //ส่งกลับและรายงานผล
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

    private function validateData($data)
    {
        //เงื่อนไข
        $rules = [
            'sapid'=>'required',
            'pid'=>'nullable',
            'location_id' => 'required',
            'response_person' => 'required',
            'section_id' => 'required',
            'tel_no' => 'required',
            'owner_id' => 'required',
            'mobility_id' => 'required',
            'asset_status_id' => 'required',
            'asset_use_status_id' => 'required',
            'brand'=>'required',
            'model'=>'required',
            'serial_no'=>'required',
            'topology_id'=>'required',
            'capacity'=>'required',
            'device_management_address'=>'nullable|ipv4',
        ];

        //ข้อความแสดงข้อผิดพลาด
        $messages = [
            'sapid.required' => 'กรุณากรอกรหัส SAP',
            'location_id.required' => 'กรุณาระบุที่ตั้ง',
            'response_person.required' =>'กรุณาระบุชื่อผู้รับผิดชอบ',
            'section_id.required' => 'กรุณาเลือกสาขา',
            'tel_no.required' => 'กรุณาใส่หมายเลขโทรศัพท์',
            'owner_id.required' => 'กรุณาระบุที่มาของเครื่อง',
            'mobility_id.required' => 'กรุณาระบุลักษณะการติดตั้ง',
            'asset_status_id.required' => 'กรุณาระบุสถานะทางทะเบียนครุภัณฑ์',
            'asset_use_status_id.required' => 'กรุณาระบุสถานะการใช้งาน',
            'brand.required' => 'กรุณาใส่ยี่ห้อ',
            'model.required' => 'กรุณาใส่รุ่น',
            'serial_no.required' => 'กรุณาใส่ serial number',
            'topology_id.required'=>'โปรดเลือกหลักการทำงาน',
            'capacity.required' => 'กรุณาระบุกำลังไฟ',
            'device_management_address.ipv4' => 'โปรดใส่ IP Address ให้ถูกต้อง',
        ];

        return $this->validate($data, $rules, $messages); //ส่งข้อผิดพลาดกลับไปยังหน้าต้นทางหรือส่งข้อมูลไปบันทึก
    }
    protected function filterUps ($section_filter, $per_page)
    {
        return Upses::where('section_id',$section_filter)->paginate($per_page)->withQueryString([
            'section_filter'=>$section_filter,
            'per_page'=>$per_page,
        ]);
    }
}
