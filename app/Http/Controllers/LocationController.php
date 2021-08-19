<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Location;
use App\Models\Building;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //แสดงรายการสถานที่
    {
        $Room =Room::paginate(20); //รวบรวมสถานที่จาก model Room แล้วแบ่งหน้าหน้าละ 20 บรรทัด

        //ส่งหน้า locationadmin และตัวแปร Rooms ผ่านตัวแปร rooms
        return view('/admin/locationadmin')->with([
            'rooms'=>$Room,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Rooms = Room::all(); //รวบรวมสถานที่จาก model Room
        $Locations = Location::all(); //รวบรวมสถานที่จาก model Location
        $Buildings = Building::all(); //รวบรวมสถานที่จาก model Building
        //ส่งหน้า addlocation พร้อมตัวแปร
        return view('/admin/addlocation')->with([
            'locations'=>$Locations,
            'buildings'=>$Buildings,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request->all();
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
        $Rooms = Room::find($id); //ค้นหาสถานที่ที่จะแก้ไข
        $Locations = Location::all(); //รวบรวมสถานที่จาก model Room
        $Buildings = Building::all(); //รวบรวมสถานที่จาก model Room
        return view('/admin/editlocation')->with([
            'rooms'=>$Rooms,
            'locations'=>$Locations,
            'buildings'=>$Buildings,
        ]);
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
        return $request->all();
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
