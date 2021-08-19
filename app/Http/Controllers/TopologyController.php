<?php

namespace App\Http\Controllers;

use App\Models\Topology;
use Illuminate\Http\Request;

class TopologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Topologies = Topology::all(); //รวบรวมข้อมูล

        //เรียกหน้า topologyadmin พร้อมกับส่งข้อมูลด้วยตัวเแปร topologies
        return view('/admin/topologyadmin')->with([
            'topologies'=>$Topologies,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/addtopology'); //เรียกหน้า addtopology
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
        $Topologies = Topology::create($request->all()); //บันทึกข้อมูลลงในฐานข้อมูล
        return redirect('/admin/topologyadmin')->with('success','บันทึกข้อมูลสำเร็จแล้ว'); //ส่งกลับไปหน้า topologyadmin พร้อมผลการบันทึกข้อมูล
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
        $Topology = Topology::find($id); //ค้นหาข้อมูลที่ต้องการแก้ไข

        //เรียกหน้า edittopology พร้อมกับส่งข้อมูลด้วยตัวแปร topology
        return view('/admin/edittopology')->with([
            'topology'=>$Topology,
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
        $this->validateData($request); //ตรวจสอบข้อมูลก่อนการบันทึก
        Topology::find($id)->update($request->all()); //แก้ไขข้อมูลในฐานข้อมูล
        return redirect('/admin/topologyadmin')->with('success','แก้ไขข้อมูลสำเร็จแล้ว');  //ส่งกลับไปหน้า topologyadmin พร้อมผลการแก้ไขข้อมูล
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
            'name'=>'required|unique:App\Topology,name',
        ];

        $messages = [
            'name.required'=>'กรุณาระบุชชื่อหลักการทำงาน',
            'name.unique'=>'มีหลักการทำงานนในระบบแล้ว',
        ];

        return $this->validate($data, $rules, $messages);
    }
}
