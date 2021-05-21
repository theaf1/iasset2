<?php

namespace App\Http\Controllers;

use App\Upsbatterytype;
use Illuminate\Http\Request;

class BatteryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Upsbatterytypes = Upsbatterytype::all();
        return view('batteryadmin')->with([
            'upsbatterytypes'=>$Upsbatterytypes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addbatterytype');
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
        $Upsbatterytypes = Upsbatterytype::create($request->all());
        return redirect('/batterytypeadmin')->with('success','บันทึกข้อมูลสำเร็จแล้ว');
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
        $Upsbatterytype = Upsbatterytype::find($id);
        return view('editbatterytype')->with([
            'upsbatterytype'=>$Upsbatterytype,
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
        Upsbatterytype::find($id)->update($request->all());
        return redirect('/batterytypeadmin')->with('success','แก้ไขข้อมูลสำเร็จแล้ว');
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
            'name'=>'required|unique:App\Upsbatterytype,name',
        ];

        $messages = [
            'name.required'=>'กรุณาระบุประเภทของแบตเตอรี่',
            'name.unique'=>'มีแบตเตอรี่ประเภทนี้แล้ว',
        ];
        return $this->validate($data, $rules, $messages);
    }
}
