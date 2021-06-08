<?php

namespace App\Http\Controllers;

use App\Topology;
use Illuminate\Http\Request;

class TopologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Topologies = Topology::all();
        return view('/admin/topologyadmin')->with([
            'topologies'=>$Topologies,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/addtopology');
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
        $Topologies = Topology::create($request->all());
        return redirect('/admin/topologyadmin')->with('success','a');
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
        $Topology = Topology::find($id);
        return view('/admin/edittopology')->with([
            'topology'=>$Topology,
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
        Topology::find($id)->update($request->all());
        return redirect('/admin/topologyadmin')->with('success','k');
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
            'name'=>'required|unique:App\Topology,name',
        ];

        $messages = [
            'name.required'=>'a',
            'name.unique'=>'b',
        ];

        return $this->validate($data, $rules, $messages);
    }
}
