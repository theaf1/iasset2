<?php

namespace App\Http\Controllers;

use App\Models\Asset_use_statuses;
use Illuminate\Http\Request;

class AssetusestatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Assetusestatuses = Asset_use_statuses::all(); //กำนดค่าตัวแปร Assetusestatuses

        //เรียกหน้า assetusestatusadmin พร้อมกับส่งค่าตัวแปร Assetusestatuses ผ่านตัวแปร assetusestatuses
        return view('/admin/assetusestatusadmin')->with([
            'assetusestatuses'=>$Assetusestatuses,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //เรียกหน้า addassetusestatus
    {
        return view('/admin/addassetusestatus');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateData($request); //ตรวจสอบข้อมูลก่อนการบันทึก
        $Assetusestatuses = Asset_use_statuses::create($request->all()); //บันทึกข้อมูลลงในฐานข้อมูล
        return redirect('/admin/assetusestatusadmin')->with('success','บันทึกข้อมูลสำเร็จแล้ว'); //ส่งกลับไปยังหน้า assetusestatusadmin พร้อมผลการบันทึกข้อมูล
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
        $Assetusestatus = Asset_use_statuses::find($id); //ค้นหาข้อมูลที่จะแก้ไข

        //เรียกหน้า editassetusestatus พร้อมกับส่งข้อมูลที่จะแก้ไขไปทางตัวแปร assetusestatus
        return view('/admin/editassetusestatus')->with([
            'assetusestatus'=>$Assetusestatus,
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
        $this->validateData($request); //ตรวจสอบข้อมูลที่จะทำการแก้ไข
        Asset_use_statuses::find($id)->update($request->all()); //แก้ไขข้อมูลในฐานข้อมูล
        return redirect('/admin/assetusestatusadmin')->with('success','แก้ไขข้อมูลสำเร็จ'); //ส่งกลับไปยังหน้า assetusestatusadmin พร้อมผลการแก้ไขข้อมูล
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
            'name'=>'required|unique:App\Asset_use_statuses,name', //ต้องมีชื่อที่ไม่ซ้ำกัน
        ];

        $messages =[
            'name.required'=>'กรุณาระบุชื่อสถานะ',
            'name.unique'=>'มีสถานะนี้ในระบบแล้ว',
        ];
        return $this->validate($data, $rules, $messages);
    }
}
