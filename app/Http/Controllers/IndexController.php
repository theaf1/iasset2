<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Peripherals;
use App\Storageperipherals;
use App\Servers;
use App\Networkdevices;
use App\NetworkedStorage;
use App\Upses;
use App\Clienttype;
use App\Peripheraltype;
use App\NetSubtype;
class IndexController extends Controller
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
            ['id'=>'2', 'name'=>'Display', 'ui_name'=>'จอภาพ'],
            ['id'=>'3', 'name'=>'Peripherals', 'ui_name'=>'อุปกรณ์ต่อพ่วง'],
            ['id'=>'4', 'name'=>'Storageperipherals', 'ui_name'=>'อุปกรณ์ต่อพ่วงเก็บข้อมูล'],
            ['id'=>'5', 'name'=>'Servers', 'ui_name'=>'คอมพิวเตอร์แม่ข่าย'],
            ['id'=>'6', 'name'=>'NetworkedStorage', 'ui_name'=>'อุปกรณ์เก็บข้อมูลเครือข่าย'],
            ['id'=>'7', 'name'=>'Networkdevices', 'ui_name'=>'อุปกรณ์เครือข่าย'],
            ['id'=>'8', 'name'=>'Upses', 'ui_name'=>'เครื่องสำรองไฟฟ้า'],
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
}
