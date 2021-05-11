<?php

namespace App\Http\Controllers;

use App\Clienttype;
use Illuminate\Http\Request;

class ClienttypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //แสดงหน้าบัญชีชนิดครุภัณฑ์คอมพิวเตอร์
    {
        $Clienttypes = Clienttype::all(); //กำหนค่าตัวแปร Clienttypes โดยอ่านค่าจาก model Clienttype

        //ส่งหน้า clienttypeadmin พร้อมกับตัวแปร Clienttype ผ่านตัวแปร clienttypes
        return view('clienttypeadmin')->with([
            'clienttypes'=>$Clienttypes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //แสดงหน้าเพิ่มชนิดครุภัณฑ์คอมพิวเตอร์
    {
        return view('addclienttype');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //บันทึกข้อมูลลงฐานข้อมูล
    {
        $this->validateData($request); //ตรวจสอบข้อมูล
        $Clienttypes = Clienttype::create($request->all()); //เขียนข้อมูลลงฐานข้อมูลผ่านทาง model Clienttypes
        return redirect('/clienttypeadmin')->with('success','บันทึกข้อมูลเรียบร้อยแล้ว'); //ส่งกลับไปยังหน้า clienttypeadmin พร้อมผลการบันทึกข้อมูล
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
    public function edit($id) //เรียกหน้าแก้ไขชนิดของครุภัณฑ์
    {
        $Clienttypes = Clienttype::find($id); //ค้นหาชนิดของครุภัณฑ์ที่ต้องการแก้ไข

        //ส่งข้อมูลชนิดของครุภัณฑ์ที่ต้องการแก้ไข
        return view('editclienttype')->with([
            'clienttype'=>$Clienttypes,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) //แก้ไขชนิดของครุภัณฑ์คอมพิวเตอร์
    {
        $this->validateData($request); //ตรวจสอบข้อมูล
        Clienttype::find($id)->update($request->all()); //แก้ไขข้อมูในฐานข้อมูล
        return redirect('/clienttypeadmin')->with('success','แก้ไขข้อมูลสำเร็จแล้ว'); //ส่งกลับไปยังหน้า clienttypeadmin พร้อมผลการแก้ไขข้อมูล
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
    private function validateData($data) //ตรวจสอบข้อมูลที่ได้รับ
    {
        $rules = [
            'name'=>'required|unique:App\Clienttype,name', //ต้องมีชื่อไม่ซ้ำกันกับของเดิม
        ];
        $messages = [
            'name.required'=>'กรุณาระบุชื่อชนิดของครุภัณฑ์',
            'name.unique'=>'มีชื่อชนิดของครุภัณฑ์แบบนี้แล้ว',
        ];
        return $this->validate($data, $rules, $messages);
    }
}
