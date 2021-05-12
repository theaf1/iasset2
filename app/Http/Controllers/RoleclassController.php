<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServerRoleclass;

class RoleclassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ServerRoleClasses = ServerRoleClass::all();
        return view('serverroleclassadmin')->with([
            'serverroleclasses'=>$ServerRoleClasses,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addserverrole');
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
        $ServerRoleClasses = ServerRoleClass::create($request->all());
        return redirect('/serverroleclassadmin')->with('success','บันทึกข้อมูลสำเร็จ');
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
        $ServerRoleClass = ServerRoleClass::find($id);
        return view('editserverrole')->with([
            'serverroleclass'=>$ServerRoleClass,
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
        ServerRoleClass::find($id)->update($request->all());
        return redirect('/serverroleclassadmin')->with('success','แก้ไขข้อมูลสำเร็จ');
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
            'name'=>'required|unique:App\ServerRoleClass,name',
        ];

        $messages = [
            'name.required'=>'กรุณาใส่ชื่อบทบาท',
            'name.unique'=>'มีชื่อบทบาทนี้แล้ว',
        ];
        return $this->validate($data, $rules, $messages);
    }
}
