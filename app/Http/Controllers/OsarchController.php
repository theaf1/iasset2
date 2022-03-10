<?php

namespace App\Http\Controllers;

use App\Models\OsArch;
use Illuminate\Http\Request;

class OsarchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Osarches = OsArch::all(); //รวบรวมข้อมูล

        //เรียกหน้า osarchadmin พร้อมกับส่งข้อมูลด้วยตัวเแปร os_arches
        return view('/admin/osarchadmin')->with([
            'os_arches'=>$Osarches,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/addosarch'); //เรียกหน้า addosarch
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
        $Osarches = OsArch::create($request->all()); //บันทึกข้อมูลลงในฐานข้อมูล
        return redirect('/admin/osarchadmin')->with('success','บันทึกข้อมูลสำเร็จ'); //ส่งกลับไปหน้า osarchadmin พร้อมผลการบันทึกข้อมูล
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
        $Osarch = OsArch::find($id); //ค้นหาข้อมูลที่ต้องการแก้ไข

        //เรียกหน้า editosarch พร้อมกับส่งข้อมูลด้วยตัวแปร osarch
        return view('/admin/editosarch')->with([
            'osarch'=>$Osarch,
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
        $this->validateData($request); //ตรวจสอบข้อมูลก่อนการบันทึก
        OsArch::find($id)->update($request->all()); //แก้ไขข้อมูลในฐานข้อมูล
        return redirect('/admin/osarchadmin')->with('success','แก้ไขข้อมูลสำเร็จแล้ว'); //ส่งกลับไปหน้า osarchadmin พร้อมผลการแก้ไขข้อมูล
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
    private function validateData ($data) //ตรวจสอบข้อมูลที่ได้รับ
    {
        //เงื่อนไขในการตรวจสอบข้อมูล
        $rules = [
            'name'=>'required|unique:App\OsArch,name',
        ];

        //ข้อความแจ้งเตือนผู้ใช้งานระบบ
        $messages =[
            'name.required'=>'กรุณาระบุชื่อโครงสร้าง',
            'name.unique'=>'มีโครงสร้างนี้ในระบบแล้ว',
        ];

        return $this->validate($data, $rules, $messages);
    }
}
