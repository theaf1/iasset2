<?php

namespace App\Http\Controllers;

use App\Models\DisplayRatio;
use Illuminate\Http\Request;

class DisplayRatioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //เรียกหน้า displayratioadmin
    {
        //ส่งหน้า displayratioadmin พร้อมกับข้อมูลจาก model DisplayRatio
        return view('/admin/displayratioadmin')->with([
            'displayratios'=>DisplayRatio::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/adddisplayratio'); //ส่งหน้า adddisplayratio ไปแสดงผล
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
        $DisplayRatios = DisplayRatio::create($request->all()); //บันทึกข้อมูลลงในฐานข้อมูล
        return redirect('/admin/displayratio')->with('success','บันทึกข้อมูลสำเร็จแล้ว'); //ส่งกลับไปหน้า displayratioadmin พร้อมกับผลการบันทึกข้อมูล
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
        $DisplayRatio = DisplayRatio::find($id); //ค้นหาข้อมูลที่ต้องการแก้ไข
        //ส่งหน้า editdisplayratio ไปพร้อมกับข้อมูลที่ตต้องการแก้ไข
        return view('/admin/editdisplayratio')->with([
            'displayratio'=>$DisplayRatio,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) //ทำการแก้ไขข้อมูลในฐานข้อมูล
    {
        $this->validateData($request); //ตรวจสอบข้อมูลก่อนการแก้ไข
        Displayratio::find($id)->update($request->all()); //แก้ไขข้อมูลในฐานข้อมูล
        return redirect('/admin/displayratio')->with('success','แก้ไขข้อมูลสำเร็จแล้ว'); //ส่งไปหน้า displayratioadmin พร้อมกับผลการแก้ไขข้อมูล
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
        //เงื่อนไขการตวจสอบข้อมูล
        $rules = [
            'name'=>'required|unique:App\Displayratio,name|regex:/[0-9]?[0-9]:[0-9]?[0-9]/',
        ];

        //ข้อความแจ้งเตือนผู้ใช้งาน
        $messages = [
            'name.required'=>'กรุณาระบุสัดส่วนของจอภาพ',
            'name.unique'=>'มีสัดส่วนจอภาพนี้ในระบบแล้ว',
            'name.regex'=>'กรุณาตรวจสอบความถูกต้องของสัดส่วน',
        ];

        return $this->validate($data, $rules, $messages);
    }
}
