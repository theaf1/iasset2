<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset_statuses;
use App\Asset_use_statuses;
use App\Section;
use App\Multiuser;
use App\Position;
use App\Storageperipherals;
use App\Owner;
use App\Mobility;
use App\DataUnit;

class StorageperipheralsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //ประกาศตัวแปรที่ใช้ในการสร้างข้อมูลอุปกรณต่อพ่วงเก็บข้อมูล
    public function index()
    {
        $Asset_statuses=Asset_statuses::all();
        $Asset_use_statuses = Asset_use_statuses::all();
        $Multiusers = Multiuser::all();
        $Positions = Position::all();
        $Sections = Section::all();
        $DataUnits = DataUnit::all();
        $Owners= Owner::all();
        $Connectivity = array(
            ['id' => '1', 'name' => 'USB'],
            ['id' => '2', 'name' => 'eSATA'],
            ['id' => '3', 'name' => 'SAS'],
        );
        $Mobility = Mobility::all();

        //ตัวแปรที่ส่งกลับไปยังหน้า addstorageperipherals
        return view('addstorageperipherals')->with([
            'asset_statuses'=>$Asset_statuses,
            'asset_use_statuses'=>$Asset_use_statuses,
            'multiusers'=>$Multiusers,
            'positions'=>$Positions,
            'sections'=>$Sections,
            'dataunits'=>$DataUnits,
            'owners'=>$Owners,
            'connectivities'=>$Connectivity,
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
    //บันทึกข้อมูลที่ได้รับจากหน้า addstorageperipherals ผ่านตัวแปร request
    public function store(Request $request)
    {
        $this->validateData($request); //ตรวจสอบข้อมูลก่อนบันทึกด้วย function validateData
        $Storagepheriperals = Storageperipherals::create($request->all()); //เขียนข้อมูลลงฐานข้อมูล
        return redirect()->back()->with('success','บันทึกข้อมูลเรียบร้อยแล้ว'); //แจ้งผลการบันทึกข้อมูลกลับไปยังหน้าเดิม
        //return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //ตัวแปรที่ใช้ในการแสดงรายละละเอียดอุปกรณ์ต่อพ่วงเก็บข้อมูล
        $Storagepheriperal=Storageperipherals::find($id);
        $Asset_statuses=Asset_statuses::all();
        $Asset_use_statuses = Asset_use_statuses::all();
        $Multiusers = Multiuser::all();
        $Positions = Position::all();
        $Sections = Section::all();
        $DataUnits = DataUnit::all();
        $Owners= Owner::all();
        $Connectivity = array(
            ['id' => '1', 'name' => 'USB'],
            ['id' => '2', 'name' => 'eSATA'],
            ['id' => '3', 'name' => 'SAS'],
        );
        $Mobility = Mobility::all();

        //ตัวแปรที่ส่งกลับไปยังหน้า StoragePeripheraldetail
        return view('StoragePeripheraldetail')->with([
            'storageperipheral'=>$Storagepheriperal,
            'asset_statuses'=>$Asset_statuses,
            'asset_use_statuses'=>$Asset_use_statuses,
            'multiusers'=>$Multiusers,
            'positions'=>$Positions,
            'sections'=>$Sections,
            'dataunits'=>$DataUnits,
            'owners'=>$Owners,
            'connectivities'=>$Connectivity,
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
        //ตัวแปรที่ใช้ในการแก้ไขข้อมูลอุปกรณ์ต่อพ่วงเก็บข้อมูล
        $Asset_statuses=Asset_statuses::all();
        $Asset_use_statuses = Asset_use_statuses::all();
        $Multiusers = Multiuser::all();
        $Positions = Position::all();
        $Sections = Section::all();
        $DataUnits = Dataunit::all();
        $Owners= Owner::all();
        $Connectivity = array(
            ['id' => '1', 'name' => 'USB'],
            ['id' => '2', 'name' => 'eSATA'],
            ['id' => '3', 'name' => 'SAS'],
        );
        $Mobility = Mobility::all();

        $storageperipheral = Storageperipherals::find($id);

        //รายการตัวแปรที่ส่งไปยังหน้า editstorageperipheral
        return view('editstorageperipherals')->with([
            'storageperipheral'=>$storageperipheral,
            'asset_statuses'=>$Asset_statuses,
            'asset_use_statuses'=>$Asset_use_statuses,
            'multiusers'=>$Multiusers,
            'positions'=>$Positions,
            'sections'=>$Sections,
            'dataunits'=>$DataUnits,
            'owners'=>$Owners,
            'connectivities'=>$Connectivity,
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
        $this->validateData($request); //ทำการตรวจสอบข้อมูล
        Storageperipherals::find($id)->update($request->all()); //ค้นหาและแก้ไขข้อมูลในตาราง storageperipherals
        return redirect('/storageperipheral')->with('success','แก้ไขข้อมูลเรียบร้อยแล้ว'); //ส่งกลับไปหน้าบัญชีและแจ้งสถานะ
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
            'multi_user_id' => 'required',
            'user' => 'required_if:multi_user_id,1',
            'position_id' => 'required',
            'tel_no' => 'required',
            'owner_id' => 'required',
            'section_id' => 'required',
            'asset_status_id' => 'required',
            'asset_use_status_id' => 'required',
            'brand'=>'required',
            'model'=>'required',
            'serial_no'=>'required',
            'connectivity' => 'required',
            'data_unit_id'=>'required',
            'total_capacity' => 'required',
            'no_of_physical_drive_max' => 'exclude_unless:is_hotswap,true|required',
            'no_of_physical_drive_max'=>'exclude_unless:is_hotswap,true|gte:2',
            'no_of_physical_drive_populated' => 'exclude_unless:is_hotswap,true|required|lte:no_of_physical_drive_max',
            'lun_count' => 'exclude_unless:is_hotswap,true|required',
        ];

        //ข้อความแสดงข้อผิดพลาด
        $messages = [
            'sapid.regex' => 'กรุณาตรวจสอบรหัส SAP',
            'location_id.required' => 'กรุณาระบุที่ตั้ง',
            'section_id.required' => 'กรุณาเลือกสาขา',
            'mobility_id.required' => 'กรุณาระบุลักษณะการใช้งาน',
            'multi_user_id.required' => 'กรุณาระบุจำนวนผู้ใช้งาน',
            'user.required_if'=>'กรุณาระบุชื่อผู้ใช้งาน',
            'position_id.required' => 'กรุณาระบุตำแแหน่งผู้ใช้งาน',
            'tel_no.required' => 'กรุณาใส่หมายเลขโทรศัพท์',
            'owner_id.required' => 'กรุณาระบุที่มา',
            'asset_status_id.required'=>'กรุณาระบุสถานะทางทะเบียนครุภัณฑ์',
            'asset_use_status_id.required'=>'กรุณาระบุสถานะการใช้งานครุภัณฑ์',
            'brand.required' => 'กรุณาใส่ยี่ห้อ',
            'model.required' => 'กรุณาใส่รุ่น',
            'serial_no.required' => 'กรุณาใส่ serial number',
            'connectivity.required' => 'กรณาลือกวิธีการเชื่อมต่อ',
            'data_unit_id.required' => 'กรุณาเลือกหน่วยวัดข้อมูล',
            'total_capacity.required' => 'กรุณาระบุความจุข้อมูล',
            'no_of_physical_drive_max.required'=> 'กรุณาระบุจำนวน disk ที่สามารถใส่ได้',
            'no_of_physical_drive_max.gte' => 'จำนวน disk ไม่เพียงพอ',
            'no_of_physical_drive_populated.required'=>'ใส่จำนวน disk ในเครื่อง',
            'no_of_physical_drive_populated.lte'=>'จำนวน disk ในเครื่องไม่ถูกต้อง',
            'lun_count.required_if'=>'ใส่จำนวน disk จำลอง',

        ];

        return $this->validate($data, $rules, $messages); //ส่งข้อผิดพลาดกลับไปยังหน้า addstorageperipherals หรือส่งข้อมูลไปบันทึก
    }
}
