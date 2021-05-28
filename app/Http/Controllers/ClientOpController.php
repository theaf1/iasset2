<?php

namespace App\Http\Controllers;

use App\ClientOperate;
use Illuminate\Http\Request;

class ClientOpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ClientOSes = ClientOperate::all();
        return view('clientopadmin')->with([
            'clientoses'=>$ClientOSes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addclientop');
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
        $ClientOSes = ClientOperate::create($request->all());
        return redirect('/clientopadmin')->with('success','เพิ่มระบบปฏิบัติการสำเร็จ');
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
        $ClientOS = ClientOperate::find($id);
        return view('editclientop')->with([
            'clientos'=>$ClientOS,
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
        ClientOperate::find($id)->update($request->all());
        return redirect('/clientopadmin')->with('success','แก้ไขระบบปฏิบัติการสำเร็จ');
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
            'name'=>'required|unique:App\ClientOperate,name',
        ];

        $messages =[
            'name.required'=>'กรุณาระบุชื่อระบบปฏิบัติการ',
            'name.unique'=>'มีระบบปฏิบัติการนีในระบบแล้ว',
        ];

        return $this->validate($data, $rules, $messages);
    }
}
