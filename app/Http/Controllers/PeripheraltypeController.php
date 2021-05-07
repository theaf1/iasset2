<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peripheraltype;

class PeripheraltypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Peripheraltypes = Peripheraltype::all();
        return view('peripheraltypeadmin')->with([
            'peripheraltypes'=>$Peripheraltypes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addperipheraltype');
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
        $Peripheraltypes = Peripheraltype::create($request->all());
        return redirect('/peripheraltypeadmin')->with('success','บันทึกข้อมูลสำเร็จแล้ว');
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
        $Peripheraltypes = Peripheraltype::find($id);
        return view('editperipheraltype')->with([
            'peripheraltype'=>$Peripheraltypes,
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
        Peripheraltype::find($id)->update($request->all());
        return redirect('/peripheraltypeadmin')->with('success','แก้ไขข้อมูลสำเร็จแล้ว');
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
            'name'=>'required|unique:App\Peripheraltype,name',
        ];

        $messages = [
            'name.required'=>'กรุณาระบุชื่อชนิดอุปกรณ์ต่อพ่วง',
            'name.unique'=>'มีชื่ออุปกรณ์ต่อพ่วงชนิดนี้แล้ว',
        ];
        return $this->validate($data, $rules, $messages);
    }
}
