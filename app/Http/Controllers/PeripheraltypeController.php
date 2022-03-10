<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peripheraltype;

class PeripheraltypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //แสดงรายการชนิดของอุปกรณ์ต่อพ่วง
    {
        $Peripheraltypes = Peripheraltype::all(); //กำหนดค่าตัวแปร Peripheraltypes จาก model Peripheraltype
        //ส่งค่าตัวแปร Peripheraltypes ไปยังหน้า peripheraltypeadmin ผ่านตัวแปร periphraltypes
        return view('/admin/peripheraltypeadmin')->with([
            'peripheraltypes'=>$Peripheraltypes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //แสดงหน้า addperiphraltype
    {
        return view('/admin/addperipheraltype');
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
        $Peripheraltypes = Peripheraltype::create($request->all()); //เขียนข้อมูลลงในฐานข้อมูล
        return redirect('/admin/peripheraltypeadmin')->with('success','บันทึกข้อมูลสำเร็จแล้ว'); //รายงานผลการบันทึกฐานข้อมูล
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
    public function edit($id) //แก้ไขข้อมูลชนิดอุปกรณ์ต่อพ่วง
    {
        $Peripheraltypes = Peripheraltype::find($id); //ค้นหาข้อมูลที่ต้องการแก้ไข
        //ส่งข้อมูลที่ต้องการแก้ไขไปกับหน้า editperipheraltype
        return view('/admin/editperipheraltype')->with([
            'peripheraltype'=>$Peripheraltypes,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) //บันทึกผการแก้ไขชนิดอุปกรณ์ต่อพ่วง
    {
        $this->validateData($request); //ตรวจสอบข้อมูลก่อนการบันทึก
        Peripheraltype::find($id)->update($request->all()); //ทำการแก้ไขข้อมูลในฐานข้อมูล
        return redirect('/admin/peripheraltypeadmin')->with('success','แก้ไขข้อมูลสำเร็จแล้ว'); //รายงานผลการแก้ไขข้อมูล
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
        //เงื่อนไขในการตรวจสอบข้อมูล
        $rules = [
            'name'=>'required|unique:App\Peripheraltype,name', //กำหนดให้ต้องมีข้อมูลและไม่ซ้ำกับของเดิม
        ];

        //ข้อความแจ้งเตือนผู้ใช้
        $messages = [
            'name.required'=>'กรุณาระบุชื่อชนิดอุปกรณ์ต่อพ่วง',
            'name.unique'=>'มีชื่ออุปกรณ์ต่อพ่วงชนิดนี้แล้ว',
        ];
        return $this->validate($data, $rules, $messages);
    }
}
