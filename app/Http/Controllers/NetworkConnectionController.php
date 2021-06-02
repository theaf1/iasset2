<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NetworkConnection;

class NetworkConnectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $NetworkConnections = Networkconnection::all(); //รวบรวมข้อมูล

        //เรียกหน้า networkconnectionadmin พร้อมกับส่งข้อมูลด้วยตัวแปร networkconnections
        return view('/admin/networkconnectionadmin')->with([
            'networkconnections'=>$NetworkConnections,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/addnetworkconnection'); //เรียกหน้า addnetworkconnection
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
        $NetworkConnections = NetworkConnection::create($request->all()); //บันทึกข้อมูลลงในฐานข้อมูล
        return redirect('/admin/networkconnectionadmin')->with('success','เพิ่มข้อมูลประเภทเครือข่ายสำเร็จ'); //ส่งกลับไปยังหน้า networkconnectionadmin พร้อมผลการบันทึกข้อมูล
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
        $NetworkConnection = NetworkConnection::find($id); //ค้นหาข้อมูลที่ต้องการแก้ไข

        //เรียกหน้า editnetworkconnection พร้อมกับส่งข้อมูลด้วยตัวแปร networkconnection
        return view('/admin/editnetworkconnection')->with([
            'networkconnection'=>$NetworkConnection,
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
        Networkconnection::find($id)->update($request->all()); //แก้ไขข้อมูลในฐานข้อมูล
        return redirect('/admin/networkconnectionadmin')->with('success','แก้ไขประเภทเครือข่ายสำเร็จ'); //ส่งกลับไปยังหน้า networkconnectionadmin พร้อมผลการแก้ไขข้อมูล
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
            'name'=>'required|unique:App\NetworkConnection,name',
        ];
        $messages = [
            'name.required'=>'กรุณาใส่ชื่อประเภทเครือข่าย',
            'name.unique'=>'มีเครือข่ายประเภทนี้แล้ว',
        ];
        return $this->validate($data, $rules, $messages);
    }
}
