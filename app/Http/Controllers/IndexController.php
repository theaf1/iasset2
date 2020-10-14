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

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Client=Client::orderBy('created_at','desc')->take(5)->get();
        $Peripherals=Peripherals::orderBy('created_at','desc')->take(5)->get();
        $Storageperipherals=Storageperipherals::orderBy('created_at','desc')->take(5)->get();
        $Servers=Servers::orderBy('created_at','desc')->take(5)->get();
        $Networkdevices=Networkdevices::orderBy('created_at','desc')->take(5)->get();
        $Networkedtorages=NetworkedStorage::orderBy('created_at','desc')->take(5)->get();
        $Upses=Upses::orderBy('created_at','desc')->take(5)->get();
        return view('index')->with([
            'clients'=>$Client,
            'peripherals'=>$Peripherals,
            'storageperipherals'=>$Storageperipherals,
            'servers'=>$Servers,
            'networkdevices'=>$Networkdevices,
            'networkedstorages'=>$Networkedtorages,
            'upses'=>$Upses,
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
