<?php

namespace App\Http\Controllers;

use App\Asset_use_statuses;
use Illuminate\Http\Request;

class AssetusestatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Assetusestatuses = Asset_use_statuses::all();

        return view('assetusestatusadmin')->with([
            'assetusestatuses'=>$Assetusestatuses,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addassetusestatus');
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
        $Assetusestatuses = Asset_use_statuses::create($request->all());
        return redirect('/assetusestatusadmin')->with('success','บันทึกข้อมูลสำเร็จแล้ว');
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
        $Assetusestatus = Asset_use_statuses::find($id);
        return view('editassetusestatus')->with([
            'assetusestatus'=>$Assetusestatus,
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
        Asset_use_statuses::find($id)->update($request->all());
        return redirect('/assetusestatusadmin')->with('success','แก้ไขข้อมูลสำเร็จ');
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
            'name'=>'required|unique:App\Asset_use_statuses,name',
        ];

        $messages =[
            'name.required'=>'กรุณาระบุชื่อสถานะ',
            'name.unique'=>'มีสถานะนี้ในระบบแล้ว',
        ];
        return $this->validate($data, $rules, $messages);
    }
}
