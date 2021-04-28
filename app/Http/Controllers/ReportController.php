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
            $Now_eng = Carbon::Now()->locale('th-th')->isoFormat('Do MMMM YYYY');
            $Now_ex = explode(' ', $Now_eng);
            $Year_th = (int)$Now_ex[2]+543;
            $Now =  $Now_ex[0].' '.$Now_ex[1].' '.$Year_th;
             
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
        if($request->report_id ==2)
        {
            $Client_Results = Client::where('section_id',$request->report_section)->count();
            $Peripherals_Results = Peripherals::where('section_id',$request->report_section)->count();
            $Storageperipherals_Results = Storageperipherals::where('section_id',$request->report_section)->count();
            $Servers_Results = Servers::where('section_id',$request->report_section)->count();
            $Networkdevice_Results = Networkdevices::where('section_id',$request->report_section)->count();
            $Networkedstorage_Results = Networkedstorage::where('section_id',$request->report_section)->count();
            $Upses_Results = Upses::where('section_id',$request->report_section)->count();
            $Now_eng = Carbon::Now()->locale('th-th')->isoFormat('Do MMMM YYYY');
            $Now_ex = explode(' ', $Now_eng);
            $Year_th = (int)$Now_ex[2]+543;
            $Now =  $Now_ex[0].' '.$Now_ex[1].' '.$Year_th;
            $Section = Section::where('id',$request->report_section)->get();
            return view('section_report')->with([
                'section'=>$Section,
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
        if ($request->report_id ==3)
        {
            
            $Now_eng = Carbon::Now()->locale('th-th')->isoFormat('Do MMMM YYYY');
            $Now_ex = explode(' ', $Now_eng);
            $Year_th = (int)$Now_ex[2]+543;
            $Now =  $Now_ex[0].' '.$Now_ex[1].' '.$Year_th;
            $Cutoff_date = Carbon::Now();
            return view('x')->with([
                'now'=>$Now,
            ]);
        }

        if ($request->report_id ==4) 
        {
            $Client_Results = Client::where('section_id',$request->report_section)->get();
            $Now_eng = Carbon::Now()->locale('th-th')->isoFormat('Do MMMM YYYY');
            $Now_ex = explode(' ', $Now_eng);
            $Year_th = (int)$Now_ex[2]+543;
            $Now =  $Now_ex[0].' '.$Now_ex[1].' '.$Year_th;
            return view('clientreportsection')->with([
                'clients'=>$Client_Results,
                'now'=>$Now,
            ]);
        }
        if ($request->report_id ==5)
        {
            $Peripherals_Results = Peripherals::where('section_id',$request->report_section)->get();
            $Now_eng = Carbon::Now()->locale('th-th')->isoFormat('Do MMMM YYYY');
            $Now_ex = explode(' ', $Now_eng);
            $Year_th = (int)$Now_ex[2]+543;
            $Now =  $Now_ex[0].' '.$Now_ex[1].' '.$Year_th;
            return view('peripheralsreportsection')->with([
                'peripherals'=>$Peripherals_Results,
                'now'=>$Now,
            ]);
        }
        if ($request->report_id ==6)
        {
            $Storageperipherals_Results = Storageperipherals::where('section_id',$request->report_section)->get();
            $Now_eng = Carbon::Now()->locale('th-th')->isoFormat('Do MMMM YYYY');
            $Now_ex = explode(' ', $Now_eng);
            $Year_th = (int)$Now_ex[2]+543;
            $Now =  $Now_ex[0].' '.$Now_ex[1].' '.$Year_th;
            return view('storageperipheralreportsection')->with([
                'storageperipherals'=>$Storageperipherals_Results,
                'now'=>$Now,
            ]);
        }
        if ($request->report_id ==7)
        {
            $Servers_Results = Servers::where('section_id', $request->report_section)->get();
            $Now_eng = Carbon::Now()->locale('th-th')->isoFormat('Do MMMM YYYY');
            $Now_ex = explode(' ', $Now_eng);
            $Year_th = (int)$Now_ex[2]+543;
            $Now =  $Now_ex[0].' '.$Now_ex[1].' '.$Year_th;
            return view(l)->with([
                'servers'=>$Servers_Results,
                'now'=>$Now,
            ]);
        }
        if ($request->report_id ==8) 
        {
            $Networkdevice_Results = Networkdevices::where('section_id', $request->report_section)->get();
            $Now_eng = Carbon::Now()->locale('th-th')->isoFormat('Do MMMM YYYY');
            $Now_ex = explode(' ', $Now_eng);
            $Year_th = (int)$Now_ex[2]+543;
            $Now =  $Now_ex[0].' '.$Now_ex[1].' '.$Year_th;
            return view(m)->with([
                'networkdevices'=>$Networkdevice_Results,
                'now'=>$Now,
            ]);
        }
        if ($request->report_id ==9)
        {
            $Networkedstorage_Results =Networkedstorage::where('section_id', $request->report_section)->get();
            $Now_eng = Carbon::Now()->locale('th-th')->isoFormat('Do MMMM YYYY');
            $Now_ex = explode(' ', $Now_eng);
            $Year_th = (int)$Now_ex[2]+543;
            $Now =  $Now_ex[0].' '.$Now_ex[1].' '.$Year_th;
            return view(n)->with([
                'networkdevices'=>$Networkedstorage_Results,
                'now'=>$Now,
            ]);
        }
        if ($request->report_id ==10)
        {
            $Upses_Results = Upses::where('section_id', $request->report_section)->get();
            $Now_eng = Carbon::Now()->locale('th-th')->isoFormat('Do MMMM YYYY');
            $Now_ex = explode(' ', $Now_eng);
            $Year_th = (int)$Now_ex[2]+543;
            $Now =  $Now_ex[0].' '.$Now_ex[1].' '.$Year_th;
            return view(o)->with([
                'upses'=>$Upses_Results,
                'now'=>$Now,
            ]);
        }
    }
}
