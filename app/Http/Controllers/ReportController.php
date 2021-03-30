<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Client;
use App\Peripherals;
use App\Storageperipherals;
use App\Servers;
use App\Networkdevices;
use App\Networkedstorage;
use App\Upses;
use App\Section;
use Carbon\Carbon;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Sections = Section::all();
        return view('reports')->with([
            'sections'=>$Sections,
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
    public function search(Request $request)
    {
        if($request->report_id ==1)
        {
            $Client_Results = Client::all()->count();
            $Peripherals_Results = Peripherals::all()->count();
            $Storageperipherals_Results = Storageperipherals::all()->count();
            $Servers_Results = Servers::all()->count();
            $Networkdevice_Results = Networkdevices::all()->count();
            $Networkedstorage_Results = Networkedstorage::all()->count();
            $Upses_Results = Upses::all()->count();
            $Now = Carbon::Now()->locale('th-th')->isoFormat('Do MMMM YYYY');
            return view('total_report')->with([
                'client'=>$Client_Results,
                'peripherals'=>$Peripherals_Results,
                'storageperipheral'=>$Storageperipherals_Results,
                'servers'=>$Servers_Results,
                'networkdevices'=>$Networkdevice_Results,
                'networkedstorage'=>$Networkedstorage_Results,
                'upses'=>$Upses_Results,
                'now'=>$Now,
            ]);
        }

        
    }
}
