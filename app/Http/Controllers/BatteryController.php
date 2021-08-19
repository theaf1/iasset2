<?php

namespace App\Http\Controllers;

use App\Models\Upsbatterytype;
use Illuminate\Http\Request;

class BatteryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //เรียกหน้าหลัก
    {
        $Upsbatterytypes = Upsbatterytype::all(); //กำหนดค่าตัวแปร Upsbatterytypes

        //เรียกหน้า batteryadmin พร้อมกับส่งตัวแปร Upsbatterytypes ผ่านตัวแปร upsbatterytypes
        return view('/admin/batteryadmin')->with([
            'upsbatterytypes'=>$Upsbatterytypes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/addbatterytype'); //เรียกหน้า addbattery
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
        $Upsbatterytypes = Upsbatterytype::create($request->all()); //เขียนข้อมูลลงฐานข้อมูล
        return redirect('/admin/batterytypeadmin')->with('success','บันทึกข้อมูลสำเร็จแล้ว'); //ส่งกลับไปยังหน้า batterytypeadmin พร้อมผลการบันทึก
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
        $Upsbatterytype = Upsbatterytype::find($id); //ค้นหาข้อมูลที่ต้องการแก้ไข

        //ส่งหน้า editbatterytype พร้อมกับข้อมูลที่จะแก้ไข
        return view('/admin/editbatterytype')->with([
            'upsbatterytype'=>$Upsbatterytype,
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
        $this->validateData($request); //ตรวจสอบข้อมูล
        Upsbatterytype::find($id)->update($request->all()); //ทำการค้นหาและแก้ไขข้อมูลในฐานข้อมูล
        return redirect('/admin/batterytypeadmin')->with('success','แก้ไขข้อมูลสำเร็จแล้ว'); //ส่งกลับไปยังหน้า batterytypeadmin พร้อมผลการแก้ไข
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
            'name'=>'required|unique:App\Upsbatterytype,name',
        ];

        $messages = [
            'name.required'=>'กรุณาระบุประเภทของแบตเตอรี่',
            'name.unique'=>'มีแบตเตอรี่ประเภทนี้แล้ว',
        ];
        return $this->validate($data, $rules, $messages);
    }
}
