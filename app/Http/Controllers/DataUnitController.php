<?php

namespace App\Http\Controllers;

use App\DataUnit;
use Illuminate\Http\Request;

class DataUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $DataUnits = DataUnit::all();
        return view('/admin/dataunitadmin')->with([
            'dataunits'=>$DataUnits,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/addataunit');
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
        $DataUnits = Dataunit::create($request->all());
        return redirect('/admin/dataunitadmin')->with('success','a');
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
        $DataUnit = Dataunit::find($id);
        return view('admin/editdataunit')->with([
            'dataunit'=>$DataUnit,
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
        Dataunit::find($id)->update($request->all());
        return redirect('/admin/dataunitadmin')->with('success','aa');
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
            'name'=>'required|unique:App\DataUnit,name',
        ];

        $messages = [
            'name.required'=>'2',
            'name.unique'=>'4',
        ];

        return $this->validate($data, $rules, $messages);
    }
}
