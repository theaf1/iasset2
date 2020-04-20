<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset_statuses;
use App\Asset_use_statuses;
use App\Section;
use App\Peripherals;
use App\Peripheraltype;
use App\Owner;
use App\Mobility;

class PeripheralsController extends Controller
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
        $Peripheraltypes = Peripheraltype::all();
        $Supplies = array(
            ['id'=>'1', 'name'=>'เบิกได้'],
            ['id'=>'2', 'name'=>'เบิกไม่ได้'],
            ['id'=>'3', 'name'=>'ไม่จำเป็น'],
        );
        $PeripheralConnections = array(
            ['id'=>'1', 'name'=>'USB'],
            ['id'=>'2', 'name'=>'Paralell port'],
            ['id'=>'3', 'name'=>'LAN'],
        );
        $ShareMethods = array(
            ['id'=>'1', 'name'=>'OS share'],
            ['id'=>'2', 'name'=>'network share'],
        );
        $Owners = Owner::all();
        $Mobility = Mobility::all();

        //ตัวแปรที่ส่งกลับไปยังหน้า addperipherals
        return view('addperipherals')->with([
            'asset_statuses'=>$Asset_statuses,
            'asset_use_statuses'=>$Asset_use_statuses,
            'sections'=>$Sections,
            'peripheraltypes'=>$Peripheraltypes,
            'supplies'=>$Supplies,
            'peripheralconnections'=>$PeripheralConnections,
            'sharemethods'=>$ShareMethods,
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //บันทึกข้อมูลที่ไดัรับจากหน้า addperipherals ผ่านตัวแปร request
    public function store(Request $request)
    {
        // return $request->all();
        $this->validateData($request); //ตรวจสอบข้อมูลก่อนการบันทึกด้วย function validateData
        $peripherals = Peripherals::create($request->all()); //เขียนข้อมูลลงฐานข้อมูล
        return redirect()->back()->with('success','บันทึกข้อมูลเรียบร้อยแล้ว'); //ส่งผลการบันทึกข้อมูลกลับไปยังหน้าเดิม
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
        $Peripheraltypes = Peripheraltype::all();
        $Supplies = array(
            ['id'=>'1', 'name'=>'เบิกได้'],
            ['id'=>'2', 'name'=>'เบิกไม่ได้'],
            ['id'=>'3', 'name'=>'ไม่จำเป็น'],
        );
        $PeripheralConnections = array(
            ['id'=>'1', 'name'=>'USB'],
            ['id'=>'2', 'name'=>'Paralell port'],
            ['id'=>'3', 'name'=>'LAN'],
        );
        $ShareMethods = array(
            ['id'=>'1', 'name'=>'OS share'],
            ['id'=>'2', 'name'=>'network share'],
        );
        $Owners = Owner::all();
        $Mobility = Mobility::all();

        $peripheral = Peripherals::find($id);

        return view('editperipherals')->with([
            'peripheral'=>$peripheral,
            'asset_statuses'=>$Asset_statuses,
            'asset_use_statuses'=>$Asset_use_statuses,
            'sections'=>$Sections,
            'peripheraltypes'=>$Peripheraltypes,
            'supplies'=>$Supplies,
            'peripheralconnections'=>$PeripheralConnections,
            'sharemethods'=>$ShareMethods,
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
        $this->validateData($request);
        Peripherals::find($id)->update($request->all());
        return redirect('/index');
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
    private function validateData($data){
        //เงื่อนไข
        $rules = [
            'type'=>'required',
            'sapid'=>'nullable',
            'pid'=>'nullable',
            'location_id'=>'required',
            'is_mobile'=>'required',
            'section'=>'required',
            'user'=>'required',
            'position' =>'required',
            'tel_no'=>'required',
            'owner'=>'required',
            'asset_status'=>'required',
            'asset_use_status'=>'required',
            'brand'=>'required',
            'model'=>'required',
            'serial_no'=>'required',
            'supply_consumables'=>'required',
            'connectivity'=>'required',
            'ip_address'=>'ipv4',
            'ip_address'=>'required_if:connectivity,3',
            'share_name'=>'required_if:is_shared,1',
            'share_method'=>'required_if:is_shared,1',
        ];

        //ข้อความแสดงข้อผิดพลา่ด
        $messages =[
            'type.required'=>'โปรดระบุชนิดของครุภัณฑ์',
            'location_id.required'=>'กรุณาระบุสถานที่ตั้ง',
            'is_mobile.required'=>'กรุณาระบุลักษณะการติดตั้ง',
            'section.required'=>'กรุณาระบุหน่วยงาน',
            'user.required'=>'กรุณาระบุชื่อผู้ใช้งาน',
            'position.required'=>'กรุณาระบุตำแหน่งผู้ใช้งาน',
            'tel_no.required'=>'กรุณาระบุหมายเลขโทรศัพท์',
            'owner.required'=>'กรุณาระบุที่มา',
            'asset_status.required'=>'กรุณาระบุสถานะทางทะเบียนครุภัณฑ์',
            'asset_use_status.required'=>'กรุณาระบุสถานะการใช้งานครุภัณฑ์',
            'brand.required'=>'กรุณาระบุยี่ห้อ',
            'model.required'=>'กรุณาระบุรุ่น',
            'serial_no.required'=>'กรุณาระบุ Serial Number',
            'supply_consumables.required'=>'กรุณาระบุสถานะการเบิกวัสดุสึกหรอสิ้นเปลื่อง',
            'connectivity.required'=>'โปรดระบุวิธีการเชื่อมต่อ',
            'ip_address.required_if'=>'โปรดระบุ IP Address',
            'ip_address.ipv4'=>'โปรดตรวจสอบ IP Address',
            'share_name.required_if'=>'กรุณาระบุ Share Name ',
            'share_method.required_if'=>'กรุณาระบุวิธีการ Share',
        ];

        return $this->validate($data, $rules, $messages); //ส่งข้อผิดพลาดกลับไปที่หน้า addperipherals หรือส่งช้อมูลไปบันทึกต่อ
    }
}
