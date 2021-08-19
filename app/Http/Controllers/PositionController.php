<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Positions = Position::all(); //รวบรวมข้อมูล

        //เรียกหน้า positionadmin พร้อมกับส่งข้อมูลผ่านตัวแปร positions
        return view('/admin/positionadmin')->with([
            'positions'=>$Positions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/addposition'); //เรียกหน้า addposition
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
        $Positions = Position::create($request->all()); //บันทึกข้อมูลลงในฐานข้อมูล
        return redirect('/admin/positionadmin')->with('success','บันทึกข้อมูลสำเร็จแล้ว'); //ส่งกลับไปหน้า positionadmin พร้อมกับผลการบันทึกข้อมูล
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
        $Position = Position::find($id); //ค้นหาข้อมูลที่จะทำการแก้ไข

        //เรียกหน้า editposition พร้อมกับส่งข้อมูลด้วยตัวแปร position
        return view('/admin/editposition')->with([
            'position'=>$Position,
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
        Position::find($id)->update($request->all()); //แก้ไขข้อมูลในฐานข้อมูล
        return redirect('/admin/positionadmin')->with('success','แก้ไขข้อมูลสำเร็จ'); //ส่งกลับไปหน้า positionadmin พร้อมกับผลการบันทึกข้อมูล
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
        $rules = [
            'name'=>'required|unique:App\Position,name',
        ];

        $messages = [
            'name.required'=>'กรุณาระบุชื่อตำแหน่ง',
            'name.unique'=>'มีตำแหน่งนี้ในระบบแล้ว',
        ];
        
        return $this->validate($data, $rules, $messages);
    }
}
