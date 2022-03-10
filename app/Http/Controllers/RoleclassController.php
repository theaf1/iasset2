<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServerRoleclass;

class RoleclassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ServerRoleClasses = ServerRoleClass::all(); //รวบรวมข้อมูล

        //เรียกหน้า serverroleclassadmin พร้อมกับส่งข้อมูลผ่านตัวแปร serverroleclasses
        return view('/admin/serverroleclassadmin')->with([
            'serverroleclasses'=>$ServerRoleClasses,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/addserverrole'); //เรียกหน้า addserverrole
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateData($request); //ตรวจสอบข้อมูลก่อนบันทึกลงในฐานข้อมูล
        $ServerRoleClasses = ServerRoleClass::create($request->all()); //บันทึกข้อมูลลงในฐานข้อมูล
        return redirect('/admin/serverroleclassadmin')->with('success','บันทึกข้อมูลสำเร็จ'); //ส่งกลับไปหน้า serverroleclassadmin พร้อมผลการบันทึกข้อมูล
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
        $ServerRoleClass = ServerRoleClass::find($id); //ค้นหาข้อมูลที่ต้องการแก้ไข

        //เรียกหน้า editserverrole พร้อมกับส่งข้อมูลด้วยตัวแปร serverroleclass
        return view('/admin/editserverrole')->with([
            'serverroleclass'=>$ServerRoleClass,
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
        $this->validateData($request); //ตรวจสอบข้อมูลก่อนการแก้ไข
        ServerRoleClass::find($id)->update($request->all()); //แก้ไขข้อมูลในฐานข้อมูล
        return redirect('/admin/serverroleclassadmin')->with('success','แก้ไขข้อมูลสำเร็จ'); //ส่งกลับไปหน้า serverroleclassadmin พร้อมผลการแก้ไขข้อมูล
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
        //เงื่อนไขในการตรวจสอบข้อมูล
        $rules = [
            'name'=>'required|unique:App\ServerRoleClass,name',
        ];

        //ข้อความแจ้งเตือนผู้ใช้งาน
        $messages = [
            'name.required'=>'กรุณาใส่ชื่อบทบาท',
            'name.unique'=>'มีชื่อบทบาทนี้แล้ว',
        ];
        return $this->validate($data, $rules, $messages);
    }
}
