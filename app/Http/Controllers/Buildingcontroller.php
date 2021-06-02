<?php

namespace App\Http\Controllers;

use App\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $Bulidings = Building::all(); //รวบรวมชื่ออาคาร

        ///เรียกหน้า buildingadmin พร้อมกับส่งตัวแปร Buildings ผ่านทางตัวแปร buildings
        return view('/admin/buildingadmin')->with([
            'buildings'=>$Bulidings,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/addbuilding'); //เรียกหน้า addbuildings
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateData($request); //ตรวจสอบข้อมูลก่อนบันทึกลงในฐานข้อมูล
        $Bulidings = Building::create($request->all()); //เขียนข้อมูลลงในฐานข้อมูล
        return redirect('/admin/buildingadmin')->with('success','บันทึกชื่ออาคารสำเร็จ'); //ส่งกลับไปยังหน้า buildingadmin พร้อมผลการบันทึกข้อมูล
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
        $Building = Building::find($id); //ค้นหาข้อมูลที่ต้องการแก้ไข
        
        //ส่งข้อมูลที่จะแก้ไขไปพร้อมกับหน้า editbuilding ด้วยตัวแปร building
        return view('/admin/editbuilding')->with([
            'building'=>$Building,
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
        Building::find($id)->update($request->all()); //ค้นหาและแก้ไขข้อมูลในฐานข้อมูล
        return redirect('/admin/buildingadmin')->with('success','แก้ไขชื่ออาคารสำเร็จ'); //ส่งกลับไปยังหน้า buildingadmin พร้อมผลการแก้ไขข้อมูล
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
            'name'=>'required|unique:App\Building,name',
        ];

        $messages = [
            'name.required'=>'กรุณาระบุชื่ออาคาร',
            'name.unique'=>'มีอาคารนี้ในระบบแล้ว',
        ];
        
        return $this->validate($data, $rules, $messages);
    }
}
