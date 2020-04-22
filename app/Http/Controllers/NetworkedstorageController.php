<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset_statuses;
use App\Asset_use_statuses;
use App\Section;
use App\NetworkedStorage;
use App\Owner;
use App\Mobility;

class NetworkedstorageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //ประกาศตัวแปรที่ใช้ใน controller
    public function index()
    {
        $Asset_statuses = Asset_statuses::all();
        $Asset_use_statuses = Asset_use_statuses::all();
        $Sections = Section::all();
        $DataUnits =array(
            ['id'=>'1', 'name'=>'GB'],
            ['id'=>'2', 'name'=>'TB']
        );
        $Owners = Owner::all();
        $Storagetypes = array(
            ['id'=>'1', 'name'=>'NAS'],
            ['id'=>'2', 'name'=>'SAN'],
        );
        $Mobility = Mobility::all();

        //ตัวแปรที่ส่งกลับไปยังหน้า addnetworkedstorage
        return view('addnetworkedstorage')->with([
            'asset_statuses'=>$Asset_statuses,
            'asset_use_statuses'=>$Asset_use_statuses,
            'sections'=>$Sections,
            'dataunits'=>$DataUnits,
            'owners'=>$Owners,
            'storagetypes'=>$Storagetypes,
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //บันทึกข้อมูลที่ได้รับจากหน้า addnetworkedstorage ผ่านตัวแปร request
    public function store(Request $request)
    {
        $this->validateData($request); //ตรวจสอบข้อมูลก่อนการบันทึกด้วย function validateData
        //return $request->all();
        $NetworkedStorage = NetworkedStorage::create($request->all());
        return redirect()->back()->with('success','บันทึกข้อมูลเรียบร้อยแล้ว');
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
        $Asset_statuses = Asset_statuses::all();
        $Asset_use_statuses = Asset_use_statuses::all();
        $Sections = Section::all();
        $DataUnits =array(
            ['id'=>'1', 'name'=>'GB'],
            ['id'=>'2', 'name'=>'TB']
        );
        $Owners = Owner::all();
        $Storagetypes = array(
            ['id'=>'1', 'name'=>'NAS'],
            ['id'=>'2', 'name'=>'SAN'],
        );
        $Mobility = Mobility::all();
        $networkedstorage = NetworkedStorage::find($id);
        //return $networkedstorage;

        return view('editnetworkedstorage')->with([
            'networkedstorage'=>$networkedstorage,
            'asset_statuses'=>$Asset_statuses,
            'asset_use_statuses'=>$Asset_use_statuses,
            'sections'=>$Sections,
            'dataunits'=>$DataUnits,
            'owners'=>$Owners,
            'storagetypes'=>$Storagetypes,
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
        $this->validateData($request);
        Networkedstorage::find($id)->update($request->all());
        return redirect('/networkedstorage');
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
    
    private function validateData($data) //ตรวจสอบข้อมูลก่อนการบันทึก
    {
        //เงื่่อนไข
        $rules = [
            'sapid' => 'nullable|regex:/^[0-9]{12}+$/',
            'pid' =>'nullable',
            'location_id' => 'required',
            'section' => 'required',
            'response_person' => 'required',
            'owner' => 'required',
            'tel_no' => 'required',
            'is_mobile' => 'required',
            'asset_status' => 'required',
            'asset_use_status' => 'required',
            'type' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'serial_no' => 'required',
            'hdd_total_cap' => 'required',
            'data_unit' => 'required',
            'no_of_physical_drive_max' => 'required|gte:2',
            'no_of_physical_drive_populated' => 'required|lte:no_of_physical_drive_max',
            'lun_count' => 'required',
            'device_name' => 'required',
            'device_management_address' => 'required|ipv4',
            'device_communication_address' => 'required',
        ];

        //ข้้อความแสดงข้อผิดพลาด
        $messages = [
            'sapid.regex' => 'กรุณาใส่รหัส SAP ให้ถูกต้อง',
            'location_id.required' => 'กรุณาระบุที่ตั้ง',
            'section.required' => 'กรุณาเลือกหน่วยงาน',
            'response_person.required' => 'กรุณาระบุผู้รับผิดชอบ',
            'owner.required' => 'กรุณาระบุที่มา',
            'tel_no.required' => 'กรุณาใส่หมายเลขโทรศัพท์',
            'is_mobile.required' => 'กรุณาระบุลักษณะการติดตั้ง',
            'asset_status.required' => 'กรุณาระบุสถานะทางทะเบียนครุภัณฑ์',
            'asset_use_status.required' => 'กรุณาระบุสถานะการใช้งานครุภัณฑ์',
            'type.required' => 'กรุณาระบุชนิดของอุปกรณ์',
            'brand.required' => 'กรุณาระบุยี่ห้อ',
            'model.required' => 'กรุณาระบุรุ่น',
            'serial_no.required' => 'กรุณาระบุ Serial Number ของเครื่อง',
            'data_unit.required' => 'กรุณาเลือกหน่วยวัดข้อมูล',
            'hdd_total_cap.required' => 'กรุณาระบุความจุข้อมูล',
            'no_of_physical_drive_max.required' => 'กรุนาระบุจำนวน disk สูงสุดของเครื่อง',
            'no_of_physical_drive_max.lte' => 'test1.1',
            'no_of_physical_drive_populated.required' => 'กรุนาระบุจำนวน disk ในเครื่อง',
            'no_of_physical_drive_populated.lte' => 'จำนวน disk ในเครื่องไม่ถูกต้อง',
            'lun_count.required' => 'กรุณาระบุจำนวน disk จำลอง',
            'device_name.required' => 'กรุณาใส่ชื่อเครื่อง',
            'device_management_address.required' => 'กรุณาระบุ ip address ของเครื่อง',
            'device_management_address.ipv4' => 'กรุณาตรวจสอบ ip address ของเครื่องให้ถูกต้อง',
            'device_communication_address.required' =>'กรุณาระบุ address ที่ใช้รับส่งข้อมูลของเครื่อง',

        ];

        return $this->validate($data, $rules, $messages); //ส่งข้อผิดพลาดกลับไปยังหน้าเดิมหรือบันทึกข้อมูล
    }
}
