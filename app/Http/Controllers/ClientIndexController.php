<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Display;
use App\Asset_statuses;
use App\Asset_use_statuses;
use App\Section;
use App\Clienttype;
use App\NetworkConnection;
use App\Owner;
use App\Mobility;

class ClientIndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Clients = Client::paginate(2);
        $Clienttypes =Clienttype::all();
        $Mobility = Mobility::all();
        $Sections = Section::all();
        $Asset_statuses = Asset_statuses::all();
        $Asset_use_statuses = Asset_use_statuses::all();
        $Owners = Owner::all();
        $Networkconnections = NetworkConnection::all();
        $Positions = array(
            ['id'=>'1','name'=>'แพทย์'],
            ['id'=>'2','name'=>'พยาบาล'],
            ['id'=>'3','name'=>'เจ้าหน้าที่'],
        );
        $DataUnits = array(
            ['id'=>'1', 'name'=>'GB'],
            ['id'=>'2', 'name'=>'TB'],
        );

        return view('clientindex')->with([
            'clients'=>$Clients,
            'asset_statuses'=>$Asset_statuses,
            'asset_use_statuses'=>$Asset_use_statuses,
            'sections'=>$Sections,
            'clienttypes'=>$Clienttypes,
            //'networkconnections'=>$NetworkConnections,
            'positions'=>$Positions,
            'dataunits'=>$DataUnits,
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
