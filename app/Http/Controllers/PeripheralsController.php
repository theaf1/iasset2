<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset_statuses;
use App\Models\Asset_use_statuses;
use App\Models\Section;
use App\Models\Peripherals;
use App\Models\Peripheraltype;
use App\Models\Multiuser;
use App\Models\Position;
use App\Models\Owner;
use App\Models\Mobility;
use App\Models\PeripheralConnect;
use App\Models\PeripheralSupply;
use Carbon\Carbon;

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
        //กำหนดตัวแปรที่ใช้ในการแสดงบัญชีอุปกรณต่อพ่วง
        
        $peripherals = $this->filterPeripheral(request()->section_filter,request()->per_page);
        foreach ($peripherals as $peripheral) //แปลงรูปแบบวันที่แก้ไขข้อมูลให้เป็น ว-ด-ป
        {
            $peripheral_upd_eng = $peripheral->updated_at->locale('th-th')->isoFormat('Do MMMM YYYY');
            $peripheral_upd_ex = explode(' ', $peripheral_upd_eng);
            $peripheral_upd_year_th = (int)$peripheral_upd_ex[2]+543;
            $peripheral_upd_year = $peripheral_upd_ex[0].' '.$peripheral_upd_ex[1].' '.$peripheral_upd_year_th;
            $peripheral->update_date = $peripheral_upd_year;
        }

        //ตัวแปรที่ส่งกลับไปยังหน้า PeripheralsIndex
        return view('PeripheralsIndex')->with([
            'peripherals'=>$peripherals,
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
        //กำหนดตัวแปรที่ใช้ใน การสร้างข้อมูลอุปกรณ์ต่อพ่วง
        $Asset_statuses = Asset_statuses::all();
        $Asset_use_statuses = Asset_use_statuses::all();
        $Sections = Section::all();
        $Peripheraltypes = Peripheraltype::all();
        $Positions = Position::all();
        $Multiusers = Multiuser::all();
        $Supplies = PeripheralSupply::all();
        $PeripheralConnections = PeripheralConnect::all();
        $ShareMethods = array(
            ['id'=>'1', 'name'=>'OS share'],
            ['id'=>'2', 'name'=>'network share'],
        );
        $Owners = Owner::all();
        $Mobility = Mobility::all();
        $lastInternalSapId = Peripherals::where('sapid', 'like', 'MED%')->orderBy('id', 'Desc')->first();
        if($lastInternalSapId == null)
        {
            $temp = 0;
        }
        else
        {
            $temp = $lastInternalSapId->sapid;
        }
        //ตัวแปรที่ส่งกลับไปยังหน้า addperipherals
        return view('addperipherals')->with([
            'asset_statuses'=>$Asset_statuses,
            'asset_use_statuses'=>$Asset_use_statuses,
            'sections'=>$Sections,
            'peripheraltypes'=>$Peripheraltypes,
            'positions'=>$Positions,
            'multiusers'=>$Multiusers,
            'supplies'=>$Supplies,
            'peripheralconnections'=>$PeripheralConnections,
            'sharemethods'=>$ShareMethods,
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
        //กำหนดตัวแปรที่ใช้ในการแสดงรายละเอียดอุปกรณ์ต่อพ่วง
        $Asset_statuses = Asset_statuses::all();
        $Asset_use_statuses = Asset_use_statuses::all();
        $Sections = Section::all();
        $Peripheraltypes = Peripheraltype::all();
        $Positions = Position::all();
        $Multiusers = Multiuser::all();
        $Supplies = PeripheralSupply::all();
        $PeripheralConnections = PeripheralConnect::all();
        $ShareMethods = array(
            ['id'=>'1', 'name'=>'OS share'],
            ['id'=>'2', 'name'=>'network share'],
        );
        $Owners = Owner::all();
        $Mobility = Mobility::all();
        $Peripheral = Peripherals::find($id);

        //ตัวแปรที่ส่งกลับไปยังหน้า Peripheraldetail
        return view('Peripheraldetail')->with([
            'asset_statuses'=>$Asset_statuses,
            'asset_use_statuses'=>$Asset_use_statuses,
            'sections'=>$Sections,
            'peripheraltypes'=>$Peripheraltypes,
            'positions'=>$Positions,
            'multiusers'=>$Multiusers,
            'supplies'=>$Supplies,
            'peripheralconnections'=>$PeripheralConnections,
            'sharemethods'=>$ShareMethods,
            'owners'=>$Owners,
            'mobiles'=>$Mobility,
            'peripheral'=>$Peripheral,
         
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
        //กำนดตัวแปรที่ใช้ในการแก้ไขข้อมูลอุปกรณ์ต่อพ่วง
        $Asset_statuses = Asset_statuses::all();
        $Asset_use_statuses = Asset_use_statuses::all();
        $Sections = Section::all();
        $Peripheraltypes = Peripheraltype::all();
        $Multiusers = Multiuser::all();
        $Positions = Position::all();
        $Supplies = PeripheralSupply::all();
        $PeripheralConnections = PeripheralConnect::all();
        $ShareMethods = array(
            ['id'=>'1', 'name'=>'OS share'],
            ['id'=>'2', 'name'=>'network share'],
        );
        $Owners = Owner::all();
        $Mobility = Mobility::all();

        $peripheral = Peripherals::find($id);
        //ตัวแปรที่ส่งไปยังหน้า editperipherals

        return view('editperipherals')->with([
            'peripheral'=>$peripheral,
            'asset_statuses'=>$Asset_statuses,
            'asset_use_statuses'=>$Asset_use_statuses,
            'sections'=>$Sections,
            'peripheraltypes'=>$Peripheraltypes,
            'positions'=>$Positions,
            'multiusers'=>$Multiusers,
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
        $this->validateData($request); //ตรวจสอบข้อมูลที่แก้ไข
        Peripherals::find($id)->update($request->all()); //ค้นหาและแก้ไขข้อมูลในตาราง peripherals
        return redirect('/peripheral')->with('success','แก้ไขข้อมูลสำเร็จแล้ว');
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
            'type_id'=>'required',
            'sapid'=>'required',
            'pid'=>'nullable',
            'location_id'=>'required',
            'mobility_id'=>'required',
            'section_id'=>'required',
            'multi_user_id'=>'required',
            'user'=>'required',
            'position_id' =>'required',
            'tel_no'=>'required',
            'owner_id'=>'required',
            'asset_status_id'=>'required',
            'asset_use_status_id'=>'required',
            'brand'=>'required',
            'model'=>'required',
            'serial_no'=>'required',
            'supply_consumables_id'=>'required',
            'connectivity_id'=>'required',
            'ip_address'=>'ipv4',
            'ip_address'=>'required_if:connectivity,3',
            'share_name'=>'required_if:is_shared,1',
            'share_method'=>'required_if:is_shared,1',
        ];

        //ข้อความแสดงข้อผิดพลา่ด
        $messages =[
            'type_id.required'=>'โปรดระบุชนิดของครุภัณฑ์',
            'sapid.required'=>'กรุณาระบุรหัส SAP',
            'location_id.required'=>'กรุณาระบุสถานที่ตั้ง',
            'mobility_id.required'=>'กรุณาระบุลักษณะการติดตั้ง',
            'section_id.required'=>'กรุณาระบุหน่วยงาน',
            'multi_user_id.required'=>'กรุณาระบุจำนวนผู้ใช้งาน',
            'user.required'=>'กรุณาระบุชื่อผู้ใช้งาน',
            'position_id.required'=>'กรุณาระบุตำแหน่งผู้ใช้งาน',
            'tel_no.required'=>'กรุณาระบุหมายเลขโทรศัพท์',
            'owner_id.required'=>'กรุณาระบุที่มา',
            'asset_status_id.required'=>'กรุณาระบุสถานะทางทะเบียนครุภัณฑ์',
            'asset_use_status_id.required'=>'กรุณาระบุสถานะการใช้งานครุภัณฑ์',
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
    protected function filterPeripheral ($section_filter, $per_page)
    {
        return Peripherals::where('section_id',$section_filter)->paginate($per_page)->withQueryString([
            'section_filter'=>$section_filter,
            'per_page'=>$per_page,
        ]);
    }
}
