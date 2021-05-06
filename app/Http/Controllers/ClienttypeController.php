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
        return view('y');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Clienttypes = Clienttype::create($request->all());
        return redirect('/x')->with('success','บันทึกข้อมูลเรียบร้อยแล้ว');
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
        //
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
        //
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
            'name'=>'unique:App\Clienttype,name',
            'name'=>'required',
        ];
        $messages = [
            'name.unique'=>'มีชื่อชนิดของครุภัณฑ์แบบนี้แล้ว',
            'name.required'=>'กรุณาระบุชื่อชนิดของครุภัณฑ์',
        ];
        return $this->validate($data, $rules, $messages);
    }
}
