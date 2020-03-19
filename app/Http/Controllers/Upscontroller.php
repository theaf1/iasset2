<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset_statuses;
use App\Asset_use_statuses;
use App\Section;
use App\Owner;
use App\Upses;

class UpsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Asset_statuses = Asset_statuses::all();
        $Asset_use_statuses = Asset_use_statuses::all();
        $Sections = Section::all();
        $Owners = Owner::all();

        return view('addups')->with([
            'asset_statuses'=>$Asset_statuses,
            'asset_use_statuses'=>$Asset_use_statuses,
            'sections'=>$Sections,
            'owners'=>$Owners,
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

        $Upses = Upses::create($request->all());
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
            'response_person' => 'required',
            'section' => 'required',
            'tel_no' => 'required',
            'owner' => 'required',
            'asset_status' => 'required',
            'asset_use_status' => 'required',
            'brand'=>'required',
            'model'=>'required',
            'serial_no'=>'required',
            'capacity'=>'required',
            'device_management_address'=>'nullable|ipv4',
        ];

        $messages = [
            'sapid.regex' => 'กรุณากรอกรหัส SAP ให้ถูกต้อง (เลข 12 หลัก)',
            'location_id.required' => 'กรุณาระบุที่ตั้ง',
            'response_person.required' =>'กรุณาระบุชื่อผู้รับผิดชอบ',
            'section.required' => 'กรุณาเลือกสาขา',
            'tel_no.required' => 'กรุณาใส่หมายเลขโทรศัพท์',
            'owner.required' => 'กรุณาระบุที่มาของเครื่อง',
            'asset_status.required' => 'กรุณาระบุสถานะทางทะเบียนครุภัณฑ์',
            'asset_use_status.required' => 'กรุณาระบุสถานะการใช้งาน',
            'brand.required' => 'กรุณาใส่ยี่ห้อ',
            'model.required' => 'กรุณาใส่รุ่น',
            'serial_no.required' => 'กรุณาใส่ serial number',
            'capacity.required' => 'กรุณาระบุกำลังไฟ',
            'device_management_address.ipv4' => 'โปรดใส่ IP Address ให้ถูกต้อง',
        ];

        return $this->validate($data, $rules, $messages);
    }
}
