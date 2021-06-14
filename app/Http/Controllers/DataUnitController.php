<?php

namespace App\Http\Controllers;

use App\DataUnit;
use Illuminate\Http\Request;

class DataUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $DataUnits = DataUnit::all(); //รวบรวมข้อมูล

        //เรียกหน้า dataunitadmin พร้อมกับส่งข้อมูลด้วยตัวแปร dataunits
        return view('/admin/dataunitadmin')->with([
            'dataunits'=>$DataUnits,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/addataunit'); //เรียกหน้า adddataunit
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
        $DataUnits = Dataunit::create($request->all()); //บันทึกข้อมุลลงในฐานข้อมูล
        return redirect('/admin/dataunitadmin')->with('success','a'); //ส่งกลับไปหน้า dataunitadmin พร้อมผลการบันทึกข้อมูล
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
        $DataUnit = Dataunit::find($id); //คันหาข้อมูลที่ต้องการแก้ไข
    
        //เรียกหน้า editdataunit พร้อมกับส่งข้อมูลด้วยตัวแปร dataunit
        return view('admin/editdataunit')->with([
            'dataunit'=>$DataUnit,
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
        Dataunit::find($id)->update($request->all()); //แก้ไขข้อมูลในฐานข้อมูล
        return redirect('/admin/dataunitadmin')->with('success','aa'); //ส่งกลับไปหน้า dataunitadmin พร้อมกับผลการแก้ไขข้อมูล
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
            'name'=>'required|unique:App\DataUnit,name',
        ];

        $messages = [
            'name.required'=>'2',
            'name.unique'=>'4',
        ];

        return $this->validate($data, $rules, $messages);
    }
}
