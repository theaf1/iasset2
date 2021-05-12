<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Owner;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Owners = Owner::all();
        return view('owneradmin')->with([
            'owners'=>$Owners,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addowner');
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
        $Owners = Owner::create($request->all());
        return redirect('/owneradmin')->with('success','เพิ่มเจ้าของเครื่องสำเร็จ');
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
        $Owner = Owner::find($id);
        return view('editowner')->with([
            'owner'=>$Owner,
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
        Owner::find($id)->update($request->all());
        return redirect('/owneradmin')->with('success','แก้ไขชื่อเจ้าของเครื่องสำเร็จ');
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
            'name'=>'required|unique:App\Owner,name',
        ];

        $messages =[
            'name.required'=>'กรุณาระบุชื่อเจ้าของเครื่อง',
            'name.unique'=>'มีชื่อเจ้าของแล้ว',
        ];
        return $this->validate($data, $rules, $messages);
    }
}
