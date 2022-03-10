<?php

namespace App\Http\Controllers;

use App\Models\ClientOperate;
use Illuminate\Http\Request;

class ClientOpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //เรียกหน้า ClientOpadmin
    {
        $ClientOSes = ClientOperate::all(); //รวบรวมข้อมูล
        //ส่งหน้า clientopadmin ไปพร้อมกับข้อมูล
        return view('/admin/clientopadmin')->with([
            'clientoses'=>$ClientOSes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //เรียกหน้าบันทึกข้อมูล
    {
        return view('/admin/addclientop'); //ส่งหน้า addclientop ไปแสดงผล
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //บันทึกข้อมูล
    {
        $this->validateData($request); //ตรวจสอบข้อมูลก่อนการบันทึก
        $ClientOSes = ClientOperate::create($request->all()); //บันทึกข้อมูลลงในฐานข้อมูล
        return redirect('/admin/clientopadmin')->with('success','เพิ่มระบบปฏิบัติการสำเร็จ'); //ส่งกลับไปหน้า clientopadmin พร้อมผลการบันทึกข้อมูล
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
    public function edit($id) //แก้ไขข้อมูล
    {
        $ClientOS = ClientOperate::find($id); //ค้นหาข้อมูลมี่ต้องการแก้ไข
        //ส่งหน้า editclientop ไปพร้อมกับข้อมูลที่จะแก้ไข
        return view('/admin/editclientop')->with([
            'clientos'=>$ClientOS,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) //ทำการแก้ไขข้อมูล
    {
        $this->validateData($request); //ตรวจสอบข้อมูลก่อนการแก้ไข
        ClientOperate::find($id)->update($request->all()); //แก้ไขข้อมูลในฐานข้อมูล
        return redirect('/admin/clientopadmin')->with('success','แก้ไขระบบปฏิบัติการสำเร็จ'); //ส่งกลับไปหน้า clientopadmin พร้อมกับผลการแก้ไขข้อมูล
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
    private function validateData ($data)
    {
        //เงื่อนไขการตรวจอบข้อมูล
        $rules = [
            'name'=>'required|unique:App\ClientOperate,name',
        ];

        //ข้อความแจ้งเตือนผู้ใช้งาน
        $messages =[
            'name.required'=>'กรุณาระบุชื่อระบบปฏิบัติการ',
            'name.unique'=>'มีระบบปฏิบัติการนี้ในระบบแล้ว',
        ];

        return $this->validate($data, $rules, $messages);
    }
}
