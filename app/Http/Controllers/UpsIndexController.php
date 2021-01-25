<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Asset_statuses;
use App\Asset_use_statuses;
use App\Section;
use App\Owner;
use App\Mobility;
use App\Upses;

class UpsIndexController extends Controller
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
        $Owners = Owner::all();
        $Forms = array(
            ['id'=>'1', 'name'=>'Tower'],
            ['id'=>'2', 'name'=>'Rack Mounted'],
        );
        $Topos = array (
            ['id'=>'1', 'name'=>'stand-by'],
            ['id'=>'2', 'name'=>'line interactive'],
            ['id'=>'3', 'name'=>'on-line'],
        );
        $Modular = array(
            ['id'=>'1', 'value'=>'0', 'name'=>'ไม่ได้'],
            ['id'=>'2', 'value'=>'1', 'name'=>'ได้'],
        );
        $Bat_type = array(
            ['id'=>'1', 'name'=>'ตะกั่ว-กรด (ปิดผนึก)'],
            ['id'=>'2', 'name'=>'ตะกั่ว-กรด (เติมน้้ากลั่น)'],
            ['id'=>'3', 'name'=>'ลิเธียมไอออน']
        );
        $ExBat = array(
            ['id'=>'1', 'value'=>'0', 'name'=>'ไม่มี'],
            ['id'=>'2', 'value'=>'1', 'name'=>'มี'],
        );
        $Mobility = Mobility::all();
        $Upses = Upses::paginate(2);
        foreach ($Upses as $Ups) {
            $Ups->update_date = $Ups->updated_at->format('d-m-Y');
        }

        return view('UpsIndex')->with([
            'upses'=>$Upses,
            'asset_statuses'=>$Asset_statuses,
            'asset_use_statuses'=>$Asset_use_statuses,
            'sections'=>$Sections,
            'owners'=>$Owners,
            'forms'=>$Forms,
            'topos'=>$Topos,
            'modulars'=>$Modular,
            'bat_types'=>$Bat_type,
            'exbats'=>$ExBat,
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
