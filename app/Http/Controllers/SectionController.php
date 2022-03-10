<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use Illuminate\Support\Facades\DB;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Sections = Section::all(); //รวบรวมข้อมูล

        //เรียกหน้า sectionadmin พร้อมกับส่งข้อมูลด้วยตัวแปร sections
        return view('/admin/sectionadmin')->with([
            'sections'=>$Sections
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/addsection'); //เรียกหน้า addsection
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateData($request); //ตรวจสอบข้อมูลก่อนบันทึก
        $Sections = Section::create($request->all()); //บันทึกข้อมูลลงในฐานข้อมูล
        return redirect('/admin/sectionadmin')->with('success','บันทึกข้อมูลเรียบร้อยแล้ว'); //ส่งกลับไปหน้า sectionadmin พร้อมกับผลการบันทึกข้อมูล
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
        $Section = Section::find($id); //ค้นหาข้อมูลที่ต้องการแก้ไข

        //เรียกหน้า editsection พร้อมกับส่งข้อมูลผ่านตัวแปร section
        return view('/admin/editsection')->with([
            'section'=>$Section,
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
        Section::find($id)->update($request->all()); //แก้ไขข้อมูลในฐานข้อมูล
        return redirect('/admin/sectionadmin')->with('success','แก้ไขข้อมูลเรียบร้อยแล้ว'); //ส่งกลับไปหน้า sectionadmin พร้อมกับผลการแก้ไขข้อมูล
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
            'name'=>'unique:App\Section,name',
        ];

        //ข้อความแจ้งเตือนผู้ใช้งาน
        $messages = [
            'name.unique'=>'มีหน่วยงานนี้แล้ว'
        ];
        return $this->validate($data, $rules, $messages);
    }
}
