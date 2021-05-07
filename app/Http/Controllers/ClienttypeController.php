<?php

namespace App\Http\Controllers;

use App\Clienttype;
use Illuminate\Http\Request;

class ClienttypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Clienttypes = Clienttype::all();
        return view('clienttypeadmin')->with([
            'clienttypes'=>$Clienttypes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addclienttype');
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
        $Clienttypes = Clienttype::create($request->all());
        return redirect('/clienttypeadmin')->with('success','บันทึกข้อมูลเรียบร้อยแล้ว');
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
        $Clienttypes = Clienttype::find($id);
        return view('editclienttype')->with([
            'clienttype'=>$Clienttypes,
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
        Clienttype::find($id)->update($request->all());
        return redirect('/clienttypeadmin')->with('success','แก้ไขข้อมูลสำเร็จแล้ว');
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
            'name'=>'required|unique:App\Clienttype,name',
        ];
        $messages = [
            'name.required'=>'กรุณาระบุชื่อชนิดของครุภัณฑ์',
            'name.unique'=>'มีชื่อชนิดของครุภัณฑ์แบบนี้แล้ว',
        ];
        return $this->validate($data, $rules, $messages);
    }
}
