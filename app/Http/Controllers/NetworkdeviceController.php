<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset_statuses;
use App\Asset_use_statuses;
use App\Section;
use App\NetSubtype;
use App\Networkdevices;
use App\Owner;
use App\Mobility;

class NetworkdeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //ประกาศตัวแปรที่ใช้ใน controller
    public function index()
    {
        //กำหนดตัวแปรที่ใช้ในการแสดงบัญชีอุปกรณ์เครือข่าย
        $Asset_statuses = Asset_statuses::all();
        $Asset_use_statuses = Asset_use_statuses::all();
        $Sections = Section::all();
        $NetSubtypes = NetSubtype::all();
        $Owners = Owner::all();
        $Mobility = Mobility::all();
        $Networkdevices = Networkdevices::paginate(2);
        foreach ($Networkdevices as $Networkdevice) //แปลงรูปแบบวันที่แก้ไขข้อมูลให้เป็น ว-ด-ป
        {
            $Networkdevice->update_date = $Networkdevice->updated_at->format('d-m-Y');
        }
        //ตัวแปรที่ส่งไปยังหน้า NetworkdeviceIndex

        return view('NetworkdeviceIndex')->with([
            'networkdevices'=>$Networkdevices,
            'asset_statuses'=>$Asset_statuses,
            'asset_use_statuses'=>$Asset_use_statuses,
            'sections'=>$Sections,
            'netsubtypes'=>$NetSubtypes,
            'owners'=>$Owners,
            'mobiles'=>$Mobility,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Asset_statuses = Asset_statuses::all();
        $Asset_use_statuses = Asset_use_statuses::all();
        $Sections = Section::all();
        $NetSubtypes = NetSubtype::all();
        $Owners = Owner::all();
        $Mobility = Mobility::all();
        $lastInternalSapId = Networkdevices::where('sapid', 'like', 'MED%')->orderBy('id', 'Desc')->first();
        if($lastInternalSapId == null)
        {
            $temp = 0;
        }
        else
        {
            $temp = $lastInternalSapId->sapid;
        }

        //ตัวแปรที่ส่งไปยังหน้า addnetworkdevices

        return view('addnetworkdevice')->with([
            'asset_statuses'=>$Asset_statuses,
            'asset_use_statuses'=>$Asset_use_statuses,
            'sections'=>$Sections,
            'netsubtypes'=>$NetSubtypes,
            'owners'=>$Owners,
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
    //บันทึกข้อมูลที่ได้รับจากหน้า addnetworkdevices ผ่านทางตัวแปร request
    public function store(Request $request)
    {
        // return $request->all();
        $this->validateData($request); //ส่งข้อมูลไปตรวจอบก่อนบันทึกด้วย function validateData
        $Networkdevices = Networkdevices::create($request->all()); //เขียนข้อมูลลงฐานข้อมูล
        return redirect()->back()->with('success','บันทึกข้อมูลเรียบร้อยแล้ว'); //ส่งผลการบันทึกข้อมูลกลับไปยังหน้าเดิม
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    //กำหนดตัวแปรที่ใช้ในการแสดงรายละเอียดของอุปกรณ์เครือข่าย
    {
        $networkdevice = Networkdevices::find($id);
        $Asset_statuses = Asset_statuses::all();
        $Asset_use_statuses = Asset_use_statuses::all();
        $Sections = Section::all();
        $NetSubtypes = NetSubtype::all();
        $Owners = Owner::all();
        $Mobility = Mobility::all();
        //ตัวแปรที่ส่งไปยังหน้า Networkdevicedetail
        return view('Networkdevicedetail')->with([
            'networkdevice'=>$networkdevice,
            'asset_statuses'=>$Asset_statuses,
            'asset_use_statuses'=>$Asset_use_statuses,
            'sections'=>$Sections,
            'netsubtypes'=>$NetSubtypes,
            'owners'=>$Owners,
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
        //กำหนดค่าตัวแปรที่ต้องใช้ในการแก้ไข
        $Asset_statuses = Asset_statuses::all();
        $Asset_use_statuses = Asset_use_statuses::all();
        $Sections = Section::all();
        $NetSubtypes = NetSubtype::all();
        $Owners = Owner::all();
        $Mobility = Mobility::all();
        $networkdevice = Networkdevices::find($id);
        //ตัวแปรที่ส่งกลับไปยังหน้า editnetworkdevice
        return view('editnetworkdevice')->with([
            'networkdevice'=>$networkdevice,
            'asset_statuses'=>$Asset_statuses,
            'asset_use_statuses'=>$Asset_use_statuses,
            'sections'=>$Sections,
            'netsubtypes'=>$NetSubtypes,
            'owners'=>$Owners,
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
        $this->validateData($request); //ตรวจสอบข้อมูลที่ทำการแก้ไข
        Networkdevices::find($id)->update($request->all()); //แก้ไขข้อมูลในตาราง Networkdevices
        return redirect('/networkdevices')->with('success','แก้ไขข้อมูลสำเร็จแล้ว');
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

    //function ตรวจสอบข้อมูล

    private function validateData($data)
    {
        //เงื่อนไข
        $rules = [
            'sapid'=>'nullable|regex:/^[0-9]{12}+$/',
            'pid'=>'nullable',
            'location_id' => 'required',
            'mobility_id' => 'required',
            'response_person' => 'required',
            'owner_id' => 'required',
            'tel_no' => 'required',
            'asset_status_id' => 'required',
            'asset_use_status_id' => 'required',
            'section_id' => 'required',
            'device_subtype_id' => 'required',
            'brand'=>'required',
            'model'=>'required',
            'serial_no'=>'required',
            'device_management_address' => 'nullable|ipv4',
        ];

        //ข้อความแสดงข้อผิดพลาด
        $messages = [
            'sapid.regex' => 'กรุณาตรวจสอบรหัส SAP',
            'location_id.required' => 'กรุณาระบุที่ตั้ง',
            'mobility_id.required' =>'กรุณาระบุลักษณะการติดตั้ง',
            'response_person.required' =>'กรุณาระบุชื่อผู้รับผิดชอบ',
            'section_id.required' => 'กรุณาเลือกสาขา',
            'owner_id.required' => 'กรุณาระบุที่มาของเครื่อง',
            'tel_no.required' => 'กรุณาใส่หมายเลขโทรศัพท์',
            'asset_status_id.required' => 'กรุณาระบุสถานะทางทะเบียนครุภัณฑ์',
            'asset_use_status_id.required' => 'กรุณาระบุสถานะการใช้งานครุภัณฑ์',
            'device_subtype_id.required' => 'กรุณาเลือกชนิดของอุปกรณ์',
            'brand.required' => 'กรุณาใส่ยี่ห้อ',
            'model.required' => 'กรุณาใส่รุ่น',
            'serial_no.required' => 'กรุณาใส่ serial number',
            'device_management_address.ipv4' => 'กรุณาตรวจสอบ IP Address'
        ];

        return $this->validate($data, $rules, $messages); //ส่งข้อผิดพลาดกลับไปยังหน้า addnetworkdevices หรือส่งข้อมูลไปบันทึก
    }
}
