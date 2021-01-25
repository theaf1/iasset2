<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Asset_statuses;
use App\Asset_use_statuses;
use App\Section;
use App\NetworkedStorage;
use App\Owner;
use App\Mobility;

class NetworkedstorageIndexController extends Controller
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
        $DataUnits =array(
            ['id'=>'1', 'name'=>'GB'],
            ['id'=>'2', 'name'=>'TB']
        );
        $Owners = Owner::all();
        $Storagetypes = array(
            ['id'=>'1', 'name'=>'NAS'],
            ['id'=>'2', 'name'=>'SAN'],
        );
        $Mobility = Mobility::all();
        $Networkedstorages = NetworkedStorage::paginate(2);
        foreach ($Networkedstorages as $Networkedstorage) {
            $Networkedstorage->update_date = $Networkedstorage->updated_at->format('d-m-Y');
        }

        //ตัวแปรที่ส่งกลับไปยังหน้า addnetworkedstorage
        return view('NetworkedstorageIndex')->with([
            'networkedstorages'=>$Networkedstorages,
            'asset_statuses'=>$Asset_statuses,
            'asset_use_statuses'=>$Asset_use_statuses,
            'sections'=>$Sections,
            'dataunits'=>$DataUnits,
            'owners'=>$Owners,
            'storagetypes'=>$Storagetypes,
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
