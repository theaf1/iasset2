<?php

namespace App\Http\Controllers;

use App\OsArch;
use Illuminate\Http\Request;

class OsarchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Osarches = OsArch::all();
        return view('/admin/osarchadmin')->with([
            'os_arches'=>$Osarches,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/addosarch');
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
        $Osarches = OsArch::create($request->all());
        return redirect('/admin/osarchadmin')->with('success','บันทึกข้อมูลสำเร็จ');
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
        $Osarch = OsArch::find($id);
        return view('/admin/editosarch')->with([
            'osarch'=>$Osarch,
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
        OsArch::find($id)->update($request->all());
        return redirect('/admin/osarchadmin')->with('success','แก้ไขข้อมูลสำเร็จแล้ว');
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
            'name'=>'required|unique:App\OsArch,name',
        ];

        $messages =[
            'name.required'=>'กรุณาระบุชื่อโครงสร้าง',
            'name.unique'=>'มีโครงสร้างนี้ในระบบแล้ว',
        ];

        return $this->validate($data, $rules, $messages);
    }
}
