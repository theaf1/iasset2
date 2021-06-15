<?php

namespace App\Http\Controllers;

use App\Opsfunction;
use Illuminate\Http\Request;

class FunctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Functions = Opsfunction::all(); //รวบรวมข้อมูล

        //เรียกหน้า functionadmin พร้อมกับส่งข้อมูลด้วยตัวแปร functions
        return view('/admin/functionadmin')->with([
            'functions'=>$Functions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/addfunction'); //เรียกหน้า addfunction
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
        $Functions = Opsfunction::create($request->all()); //บันทึกข้อมูลลงฐานข้อมูล
        return redirect('/admin/functionadmin')->with('success','บันทึกข้อมูลสำเร็จแล้ว'); //ส่งกลับไปหน้า functionadmin พร้อมผลการทำาน
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
        $Function = Opsfunction::find($id); //ค้นหาข้อมูลที่จะแก้ไข

        //เรียกหน้า editfunction พร้อมกับส่งข้อมูลด้วยตัวแปร function
        return view('/admin/editfunction')->with([
            'function'=>$Function,
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
        Opsfunction::find($id)->update($request->all()); //แก้ไขข้อมูลในฐานข้อมูล
        return redirect('/admin/functionadmin')->with('success','แก้ไขข้อมูลสำเร็จแล้ว');  //ส่งกลับไปหน้า functionadmin พร้อมผลการทำาน
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
            'name'=>'required|unique:App\Opsfunction,name',
        ];

        $messages = [
            'name.required'=>'กรุณาระบุชื่อระบบงานภายใน',
            'name.unique'=>'มีระบบงานภายในชื่อนี้แล้ว',
        ];

        return $this->validate($data, $rules, $messages);
    }
}
