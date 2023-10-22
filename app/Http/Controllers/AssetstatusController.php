<?php

namespace App\Http\Controllers;

use App\Models\Asset_statuses;
use Illuminate\Http\Request;

class AssetstatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //เรียกหน้าหลัก
    {
        $Asset_statuses = Asset_statuses::all(); //กำหนดค่าตัวแปร Asset_statuses
        //เรียกหน้า assetstatusadmin พร้อมกับส่งค่าตัวแปร Asset_statuses ผ่านตัวแปร assetstatuses
        return view('/admin/assetstatusadmin')->with([
            'assetstatuses'=>$Asset_statuses,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/addassetstatus'); //เรียกหน้า addassetstatus
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateData($request); //ตรวจสอบข้อมูลก่อนเขียนลงฐานข้อมูล
        $Asset_statuses = Asset_statuses::create($request->all()); //เขียนข้อมูลลงฐานข้อมูล
        return redirect('/admin/assetstatusadmin')->with('success','บันทึกข้อมูลสำเร็จแล้ว'); //เรียกหน้า assetstatusadmin พร้อมกับส่งผลการบันทึกข้อมูล
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
        $Asset_status = Asset_statuses::find($id); //ค้นห้าข้อมูลที่ต้องการแก้ไข
        //เรียกหน้า editassetstatus พร้อมกับส่งข้อมูลผ่านตัวแปร assetstatus
        return view('/admin/editassetstatus')->with([
            'assetstatus'=>$Asset_status,
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
        return $request->all();
        $this->validateData($request); //ตรวจสอบข้อมูลก่อนการแก้ไข
        Asset_statuses::find($id)->update($request->all()); //ค้นหาและแก้ไขข้อมูล
        return redirect('/admin/assetstatusadmin')->with('success','บันทึกข้อมูลสำเร็จแล้ว'); //เรียกหน้า assetstatusadmin พร้อมกับส่งผลการบันทึกข้อมูล
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
        $rules =[
            'name'=>'required|unique:App\Asset_statuses,name', //ต้องมีชื่อที่ไม่ซ้ำกับของเดิม
        ];

        $message =[
            'name.required'=>'กรุณาระบุชื่อสถานะ',
            'name.unique'=>'มีชื่อสถานะนี้แล้ว',
        ];
        return $this->validate($data, $rules, $message);
    }
}
