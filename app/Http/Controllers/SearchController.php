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

        return view('search')->with([
            'clienttypes'=>$Clienttypes,
            'peripheraltypes'=>$Peripheraltypes,
            'netsubtypes'=>$NetSubtypes,
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
    public function search()
    {
        return 'hello';
        // $Results=Client::where('sap_id', $request['search']);
        // if(count($Results)>0)
        //     return $Results->all();
        // else
        //     return 'not found';
    }
}
