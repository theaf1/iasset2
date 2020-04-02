<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset_statuses;
use App\Asset_use_statuses;
use App\Section;
use App\Storageperipherals;
use App\Owner;

class StorageperipheralsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Asset_statuses=Asset_statuses::all();
        $Asset_use_statuses = Asset_use_statuses::all();
        $Sections = Section::all();
        $DataUnits = array(
            ['id' => '1', 'name' => 'GB'],
            ['id' => '2', 'name' => 'TB'],
        );
        $Owners= Owner::all();
        $Connectivity = array(
            ['id' => '1', 'name' => 'USB'],
            ['id' => '2', 'name' => 'eSATA'],
            ['id' => '3', 'name' => 'SAS'],
        );

        return view('addstorageperipherals')->with([
            'asset_statuses'=>$Asset_statuses,
            'asset_use_statuses'=>$Asset_use_statuses,
            'sections'=>$Sections,
            'dataunits'=>$DataUnits,
            'owners'=>$Owners,
            'connectivities'=>$Connectivity,
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
        $this->validateData($request);
        $Storagepheriperals = Storageperipherals::create($request->all());
        return redirect()->back()->with('success','บันทึกข้อมูลเรียบร้อยแล้ว');
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

    private function validateData($data)
    {
        $rules = [
            'sapid'=>'nullable|regex:/^[0-9]{12}+$/',
            'pid'=>'nullable',
            'location_id' => 'required',
            'user' => 'required',
            'position' => 'required',
            'tel_no' => 'required',
            'owner' => 'required',
            'section' => 'required',
            'asset_status' => 'required',
            'asset_use_status' => 'required',
            'brand'=>'required',
            'model'=>'required',
            'serial_no'=>'required',
            'connectivity' => 'required',
            'data_unit'=>'required',
            'total_capacity' => 'required',
            'no_of_physical_drive_max' => 'required_if:is_hotswap,1|gte:2',
            'no_of_physical_drive_populated' => 'required_if:is_hotswap,1|lte:no_of_physical_drive_max',
            'lun_count' => 'required_if:is_hotswap,1',
        ];

        $messages = [
            'sapid.regex' => 'กรุณาตรวจสอบรหัส SAP',
            'location_id.required' => 'กรุณาระบุที่ตั้ง',
            'section.required' => 'กรุณาเลือกสาขา',
            'user.required'=>'กรุณาระบุชื่อผู้ใช้งาน',
            'position.required' => 'กรุณาระบุตำแแหน่งผู้ใช้งาน',
            'tel_no.required' => 'กรุณาใส่หมายเลขโทรศัพท์',
            'owner.required' => 'กรุณาระบุที่มา',
            'asset_status.required'=>'กรุณาระบุสถานะทางทะเบียนครุภัณฑ์',
            'asset_use_status.required'=>'กรุณาระบุสถานะการใช้งานครุภัณฑ์',
            'brand.required' => 'กรุณาใส่ยี่ห้อ',
            'model.required' => 'กรุณาใส่รุ่น',
            'serial_no.required' => 'กรุณาใส่ serial number',
            'connectivity.required' => 'กรณาลือกวิธีการเชื่อมต่อ',
            'data_unit.required' => 'กรุณาเลือกหน่วยวัดข้อมูล',
            'total_capacity.required' => 'กรุณาระบุความจุข้อมูล',
            'no_of_physical_drive_max.required_if'=> 'กรุณาระบุจำนวน disk ที่สามารถใส่ได้',
            'no_of_physical_drive_max.gte' => 'จำนวน disk ไม่เพียงพอ',
            'no_of_physical_drive_populated.required_if'=>'ใส่จำนวน disk ในเครื่อง',
            'no_of_physical_drive_populated.lte'=>'จำนวน disk ในเครื่องไม่ถูกต้อง',
            'lun_count.required_if'=>'ใส่จำนวน disk จำลอง',

        ];

        return $this->validate($data, $rules, $messages);
    }
}
