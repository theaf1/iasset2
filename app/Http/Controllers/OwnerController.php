<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Owner;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Owners = Owner::all(); //รวบรวมข้อมูล

        //เรียกหน้า owneradmin พร้อมกับส่งข้อมูลด้วยตัวแปร ownners
        return view('/admin/owneradmin')->with([
            'owners'=>$Owners,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/addowner'); //เรียกหน้า addowner
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
        $Owners = Owner::create($request->all()); //บันทึกข้อมูลลงในฐานข้อมูล
        return redirect('/admin/owneradmin')->with('success','เพิ่มเจ้าของเครื่องสำเร็จ'); //ส่งกลับไปยังหน้า owneradmin พร้อมกับผลการบันทึกข้อมูล
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
        $Owner = Owner::find($id); //ค้นหาข้อมูลที่ต้องการแก้ไข

        //เรียกหน้า editowner พร้อมกับส่งข้อมูลด้วยตัวแปร owner
        return view('/admin/editowner')->with([
            'owner'=>$Owner,
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
        Owner::find($id)->update($request->all()); //แก้ไขข้อมูลในฐานข้อมูล
        return redirect('/admin/owneradmin')->with('success','แก้ไขชื่อเจ้าของเครื่องสำเร็จ'); //ส่งกลับไปยังหน้า owneradmin พร้อมกับผลการแก้ไขข้อมูล
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
            'name'=>'required|unique:App\Owner,name',
        ];

        $messages =[
            'name.required'=>'กรุณาระบุชื่อเจ้าของเครื่อง',
            'name.unique'=>'มีชื่อเจ้าของแล้ว',
        ];
        return $this->validate($data, $rules, $messages);
    }
}
