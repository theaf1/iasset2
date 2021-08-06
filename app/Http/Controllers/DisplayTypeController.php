<?php

namespace App\Http\Controllers;

use App\DisplayType;
use Illuminate\Http\Request;

class DisplayTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/admin/displaytypeadmin')->with([
            'displaytypes'=>DisplayType::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/adddisplaytype');
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
        $DisplayTypes = DisplayType::create($request->all());
        return redirect('/admin/displaytype')->with('success','บันทึกข้อมูลสำเร็จ');
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
        return view('/admin/editdisplaytype')->with([
            'displaytype'=>DisplayType::find($id),
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
        DisplayType::find($id)->update($request->all());
        return redirect('/admin/displaytype')->with('success','แก้ไขข้อมูลสำเร็จ');
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
            'name'=>'required|unique:App\DisplayType,name',
        ];

        $messages = [
            'name.required'=>'กรุณาระบุชื่อชนิดจอภาพ',
            'name.unique'=>'มีชื่อจอภาพชนิดนี้ในระบบแล้ว',
        ];
        
        return $this->validate($data, $rules, $messages);
    }
}
