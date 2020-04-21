<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset_statuses;
use App\Asset_use_statuses;
use App\Section;
use App\Peripherals;
use App\Peripheraltype;
use App\Owner;
use App\Mobility;

class PeripheralsIndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Asset_statuses = Asset_statuses::all();
        $Asset_use_statuses = Asset_use_statuses::all();
        $Sections = Section::all();
        $Peripheraltypes = Peripheraltype::all();
        $Supplies = array(
            ['id'=>'1', 'name'=>'เบิกได้'],
            ['id'=>'2', 'name'=>'เบิกไม่ได้'],
            ['id'=>'3', 'name'=>'ไม่จำเป็น'],
        );
        $PeripheralConnections = array(
            ['id'=>'1', 'name'=>'USB'],
            ['id'=>'2', 'name'=>'Paralell port'],
            ['id'=>'3', 'name'=>'LAN'],
        );
        $ShareMethods = array(
            ['id'=>'1', 'name'=>'OS share'],
            ['id'=>'2', 'name'=>'network share'],
        );
        $Owners = Owner::all();
        $Mobility = Mobility::all();
        $peripherals = Peripherals::paginate(2);

        //ตัวแปรที่ส่งกลับไปยังหน้า addperipherals
        return view('PeripheralsIndex')->with([
            'peripherals'=>$peripherals,
            'asset_statuses'=>$Asset_statuses,
            'asset_use_statuses'=>$Asset_use_statuses,
            'sections'=>$Sections,
            'peripheraltypes'=>$Peripheraltypes,
            'supplies'=>$Supplies,
            'peripheralconnections'=>$PeripheralConnections,
            'sharemethods'=>$ShareMethods,
            'owners'=>$Owners,
            'mobiles'=>$Mobility,
         
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
