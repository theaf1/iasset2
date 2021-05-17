<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServerOp;

class ServerOsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //เรียกหน้า serveropsadmin
    {
        $ServerOps = ServerOp::all(); //รวบรวมข้อมูล

        // ส่งหน้า serveropsadmin พร้อมกับตัวแปร ServerOps ผ่านตัวแปร serverops
        return view('serveropsadmin')->with([
            'serverops'=>$ServerOps,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //เรียกหน้า addserverop
    {
        return view('addserverop');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) 
    {
        $this->validateData($request); //ตรวจสอบข้อมูลก่อนเขียนลงในฐานข้อมูล
        $ServerOps = ServerOp::create($request->all()); //เขียนข้อมูลลงในฐานข้อมูล
        return redirect('/serveropadmin')->with('success','เพิ่มชื่อระบบปฏิบัติการสำเร็จ'); //ส่งกลับไปยังหน้า serveropadmin พร้อมผลการบันทึกข้อมูล
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
    public function edit($id) //แสดงหน้าแก้ไขข้อมูล
    {
        $ServerOp = ServerOp::find($id); //ค้นหาข้อมูลที่จะแก้ไข

        //ส่งหน้า editserverop พร้อมกับข้อมูลที่จะแก้ไข
        return view('editserverop')->with([
            'serverop'=>$ServerOp,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) //แก้ไขข้อมูล
    {
        $this->validateData($request); //ตรวจสอบข้อมูลก่อนแก้ไขในฐานข้อมูล
        ServerOp::find($id)->update($request->all()); //แก้ไขข้อมูลในฐานข้อมูล
        return redirect('/serveropadmin')->with('success','แก้ไขชื่อระบบปฏิบัติการสำเร็จ'); //ส่งกลับไปยังหน้า serveropadmin พร้อมผลการแก้ไขข้อมูล
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
            'name'=>'required|unique:App\ServerOp,name', //ต้องมีชื่อและไม่ซ้ำกัน
        ];

        $messages = [
            'name.required'=>'กรุณาใส่ชื่อระบบปฏิบัติการ',
            'name.unique'=>'มีชื่อระบบปฏิบัติการนี้ในะระบบแล้ว',
        ];

        return $this->validate($data, $rules, $messages);
    }
}
