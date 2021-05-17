<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NetSubtype;

class NettypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $NetSubtypes = NetSubtype::all();
        return view('netsubtypeadmin')->with([
            'netsubtypes'=>$NetSubtypes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addnetsubtype');
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
        $NetSubtypes = NetSubtype::create($request->all());
        return redirect('/netsubtypeadmin')->with('success','บันทึกข้อมูลสำเร็จ');
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
        $NetSubtype = Netsubtype::find($id);
        return view('editnetsubtype')->with([
            'netsubtype'=>$NetSubtype,
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
        NetSubtype::find($id)->update($request->all());
        return redirect('/netsubtypeadmin')->with('success','แก้ไขข้อมูลสำเร็จ');
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
            'name'=>'required|unique:App\NetSubtype,name',
        ];

        $messages = [
            'name.required'=>'1',
            'name.unique'=>'2',
        ];
        return $this->validate($data, $rules, $messages);
    }
}
