<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Asset_statuses;
use App\Asset_use_statuses;
use App\Section;
use App\Servers;
use App\ServerOp;
use App\ServerRoleClass;
use App\NetworkConnection;
use App\Owner;
use App\Mobility;

class ServerIndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ตัวแปรที่ใช้ในการแสดงบัญชีคอมพิวเตอร์แม่ข่าย
        $Asset_statuses = Asset_statuses::all();
        $Asset_use_statuses = Asset_use_statuses::all();
        $Sections = Section::all();
        $ServerOSes = ServerOp::all();
        $ServerRoleClass = ServerRoleclass::all();
        $NetworkConnections = NetworkConnection::all();
        $Forms = array (
            ['id'=>'1', 'name'=>'Tower'],
            ['id'=>'2', 'name'=>'Rack Mounted'],
        );
        $DataUnits = array(
            ['id'=>'1', 'name'=>'GB'],
            ['id'=>'2', 'name'=>'TB'],
        );
        $Owners = Owner::all();
        $Mobility = Mobility::all();
        $Servers = Servers::paginate(2);
        foreach ($Servers as $Server) //แปลงรูปแแบวันที่แก้ไขข้อมูลให้เป็น ว-ด-ป
        {
            $Server->update_date = $Server->updated_at->format('d-m-Y');
        }

        //ตัวแปรที่ส่งไปยังหน้า ServerIndex
        return view('ServerIndex')->with([
            'servers'=>$Servers,
            'asset_statuses'=>$Asset_statuses,
            'asset_use_statuses'=>$Asset_use_statuses,
            'sections'=>$Sections,
            'server_oses'=>$ServerOSes,
            'server_role_classes'=>$ServerRoleClass,
            'network_connections'=>$NetworkConnections,
            'forms'=>$Forms,
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
