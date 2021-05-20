<?php

namespace App\Http\Controllers;

use App\Asset_statuses;
use Illuminate\Http\Request;

class AssetstatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Asset_statuses = Asset_statuses::all();
        return view('assetstatusadmin')->with([
            'assetstatuses'=>$Asset_statuses,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addassetstatus');
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
        $Asset_statuses = Asset_statuses::create($request->all());
        return redirect('/assetstatusadmin')->with('success','บันทึกข้อมูลสำเร็จแล้ว');
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
        $Asset_status = Asset_statuses::find($id);
        return view('editasset')->with([
            'asset_status'=>$Asset_status,
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
        Asset_statuses::find($id)->update($request->all());
        return redirect('/assetstatusadmin')->with('success','บันทึกข้อมูลสำเร็จแล้ว');
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
        $rules =[
            'name'=>'required|unique:App\Asset_statuses,name',
        ];

        $messages =[
            'name.required'=>'a',
            'name.unique'=>'shaaaark',
        ];
        return $this->validate($data, $rules, $messages);
    }
}
