<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NetworkConnection;

class NetworkConnectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $NetworkConnections = Networkconnection::all();

        return view('networkconnectionadmin')->with([
            'networkconnections'=>$NetworkConnections,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addnetworkconnection');
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
        $NetworkConnections = NetworkConnection::create($request->all());
        return redirect('/networkconnectionadmin')->with('success','เพิ่มข้อมูลประเภทเครือข่ายสำเร็จ');
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
        $NetworkConnection = NetworkConnection::find($id);
        return view('editnetworkconnection')->with([
            'networkconnection'=>$NetworkConnection,
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
        Networkconnection::find($id)->update($request->all());
        return redirect('/networkconnectionadmin')->with('success','แก้ไขประเภทเครือข่ายสำเร็จ');
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
            'name'=>'required|unique:App\NetworkConnection,name',
        ];
        $messages = [
            'name.required'=>'กรุณาใส่ชื่อประเภทเครือข่าย',
            'name.unique'=>'มีเครือข่ายประเภทนี้แล้ว',
        ];
        return $this->validate($data, $rules, $messages);
    }
}
