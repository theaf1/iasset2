<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Client;
use App\Clienttype;
use App\Display;
use App\Peripherals;
use App\Peripheraltype;
use App\Storageperipherals;
use App\Networkdevices;
use App\Servers;
use App\ServerRoleClass;
use App\ServerOp;
use App\NetworkedStorage;
use App\Upses;
use App\NetSubtype;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Clienttypes = Clienttype::all();
        $Peripheraltypes = Peripheraltype::all();
        $NetSubtypes = NetSubtype::all();
        $Searchclass= array(
            ['id'=>'1', 'name'=>'Client', 'ui_name'=>'คอมพิวเตอร์'],
            ['id'=>'2', 'name'=>'Peripherals', 'ui_name'=>'อุปกรณ์ต่อพ่วง'],
            ['id'=>'3', 'name'=>'Storageperipherals', 'ui_name'=>'อุปกรณ์ต่อพ่วงเก็บข้อมูล'],
            ['id'=>'4', 'name'=>'Servers', 'ui_name'=>'คอมพิวเตอร์แม่ข่าย'],
            ['id'=>'5', 'name'=>'NetworkedStorage', 'ui_name'=>'อุปกรณ์เก็บข้อมูลเครือข่าย'],
            ['id'=>'6', 'name'=>'Networkdevices', 'ui_name'=>'อุปกรณ์เครือข่าย'],
            ['id'=>'7', 'name'=>'Upses', 'ui_name'=>'เครื่องสำรองไฟฟ้า'],
        );

        return view('search')->with([
            'clienttypes'=>$Clienttypes,
            'peripheraltypes'=>$Peripheraltypes,
            'netsubtypes'=>$NetSubtypes,
            'searches'=>$Searchclass,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($request)
    {
        return $request->all();
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
    public function search(Request $request)
    {
        $this->validateQuery($request);
        return $request->all();
        $Results=Client::where('sapid', $request->search)->get();
        //return count($Results);    
        return view('results')->with([
            'results'=>$Results,
        ]);
    }
    private function validateQuery($data)
    {
        $rules = [
            'search_class' => 'required',
        ];

        $messages = [
            'search_class.required' => 'require'
        ];
        return $this->validate($data, $rules, $messages);
    }
}
