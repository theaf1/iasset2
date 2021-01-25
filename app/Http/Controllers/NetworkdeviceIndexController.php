<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Asset_statuses;
use App\Asset_use_statuses;
use App\Section;
use App\NetSubtype;
use App\Networkdevices;
use App\Owner;
use App\Mobility;

class NetworkdeviceIndexController extends Controller
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
        $NetSubtypes = NetSubtype::all();
        $Owners = Owner::all();
        $Mobility = Mobility::all();
        $Networkdevices = Networkdevices::paginate(2);
        foreach ($Networkdevices as $Networkdevice) {
            $Networkdevice->update_date = $Networkdevice->updated_at->format('d-m-Y');
        }
        //ตัวแปรที่ส่งไปยังหน้า addnetworkdevices

        return view('NetworkdeviceIndex')->with([
            'networkdevices'=>$Networkdevices,
            'asset_statuses'=>$Asset_statuses,
            'asset_use_statuses'=>$Asset_use_statuses,
            'sections'=>$Sections,
            'netsubtypes'=>$NetSubtypes,
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
