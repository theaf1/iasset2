<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NetSubtype;

class NettypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $NetSubtypes = NetSubtype::all(); //รวบรวมข้อมูล

        //เรียกหน้า netsubtypeadmin พร้อมกับส่งตัวแปร NetSubtypes ผ่านตัวแปร netsubtype
        return view('/admin/netsubtypeadmin')->with([
            'netsubtypes'=>$NetSubtypes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/addnetsubtype'); //เรียกหน้า addnetsubtype
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
        $NetSubtypes = NetSubtype::create($request->all());//เขียนข้อมูลลงในฐานข้อมูล
        return redirect('/admin/netsubtypeadmin')->with('success','บันทึกข้อมูลสำเร็จ'); //ส่งกลับไปหน้า netsubtypeadmin พร้อมผลการบันทึกข้อมูล
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
        $NetSubtype = Netsubtype::find($id); //ค้นหาข้อมูลที่จะทำการแก้ไข

        //ส่งข้อมูลที่จะแก้ไขไปพร้อมกับหน้า editnetsubtype ด้วยตัวแปร netsubtype 
        return view('/admin/editnetsubtype')->with([
            'netsubtype'=>$NetSubtype,
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
        $this->validateData($request); //ตรวจสอข้อมูลที่จะทำการแก้ไข
        NetSubtype::find($id)->update($request->all()); //แก้ไขข้อมูลในฐานข้อมูล
        return redirect('/admin/netsubtypeadmin')->with('success','แก้ไขข้อมูลสำเร็จ'); //ส่งกลับไปหน้า netsubtypeadmin พร้อมผลการบันทึกข้อมูล
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
            'name'=>'required|unique:App\NetSubtype,name',
        ];

        $messages = [
            'name.required'=>'1',
            'name.unique'=>'2',
        ];
        return $this->validate($data, $rules, $messages);
    }
}
