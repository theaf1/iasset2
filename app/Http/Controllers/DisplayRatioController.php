<?php

namespace App\Http\Controllers;

use App\Models\DisplayRatio;
use Illuminate\Http\Request;

class DisplayRatioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/admin/displayratioadmin')->with([
            'displayratios'=>DisplayRatio::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/adddisplayratio');
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
        $DisplayRatios = DisplayRatio::create($request->all());
        return redirect('/admin/displayratio')->with('success','บันทึกข้อมูลสำเร็จแล้ว');
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
        $DisplayRatio = DisplayRatio::find($id);
        return view('/admin/editdisplayratio')->with([
            'displayratio'=>$DisplayRatio,
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
        Displayratio::find($id)->update($request->all());
        return redirect('/admin/displayratio')->with('success','แก้ไขข้อมูลสำเร็จแล้ว');
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
            'name'=>'required|unique:App\Displayratio,name|regex:/[0-9]?[0-9]:[0-9]?[0-9]/',
        ];

        $messages = [
            'name.required'=>'กรุณาระบุสัดส่วนของจอภาพ',
            'name.unique'=>'มีสัดส่วนจอภาพนี้ในระบบแล้ว',
            'name.regex'=>'กรุณาตรวจสอบความถูกต้องของสัดส่วน',
        ];

        return $this->validate($data, $rules, $messages);
    }
}
