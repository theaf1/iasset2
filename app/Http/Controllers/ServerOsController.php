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
    public function index()
    {
        $ServerOps = ServerOp::all();
        return view('serveropsadmin')->with([
            'serverops'=>$ServerOps,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $this->validateData($request);
        $ServerOps = ServerOp::create($request->all());
        return redirect('/serveropadmin')->with('success','เพิ่มชื่อระบบปฏิบติการสำเร็จ');
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
        $ServerOp = ServerOp::find($id);
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
    public function update(Request $request, $id)
    {
        $this->validateData($request);
        ServerOp::find($id)->update($request->all());
        return redirect('/serveropadmin')->with('success','แก้ไขชื่อระบบปฏิบัติการสำเร็จ');
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
            'name'=>'required|unique:App\ServerOp,name',
        ];

        $messages = [
            'name.required'=>'กรุณาใส่ชื่อระบบปฏิบัติการ',
            'name.unique'=>'มีชื่อระบบปฏิบัติการนี้ในะระบบแล้ว',
        ];

        return $this->validate($data, $rules, $messages);
    }
}
