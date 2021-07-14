<?php

namespace App\Http\Controllers;

use App\Section;
use App\Asset_statuses;
use App\Asset_use_statuses;
use App\Position;
use Illuminate\Http\Request;

class LooseDisplayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('loosedisplay')->with([
            'sections'=>Section::all(),
            'asset_statuses'=>Asset_statuses::all(),
            'asset_use_statuses'=>Asset_use_statuses::all(),
            'positions'=>Position::all(),
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
        $this->validateData($request);
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
    private function validateData ($data)
    {
        $rules = [
            'display_sapid'=>'required',
            'year'=>'required',
            'location_id'=>'required',
            'section_id'=>'required',
            'response_person'=>'required',
            'position_id'=>'required',
            'tel_no'=>'required',
            'asset_status_id'=>'required',
            'asset_use_status_id'=>'required',
            'brand'=>'required',
            'model'=>'required',
            'serial_no'=>'required',
            'display_size'=>'required',
            'display_ratio_id'=>'required',
        ];

        $messages = [
            'display_sapid.required'=>'กรุณาตรวจสอบรหัส SAP',
            'year.required'=>'กรุณาระบุปีทะเบียนครุภัณฑ์',
            'location_id.required'=>'กรุณาระบุสถานที่ตั้งเครื่อง',
            'section_id.required'=>'กรุณาระบุหน่วยงาน',
            'response_person.required'=>'กรุณาระบุชื่อผู้รับผิดชอบ',
            'position_id.required'=>'กรุณาระบุตำแหน่งผู้รับผิดชอบ',
            'tel_no.required'=>'กรุณาระบุหมายเลขโทรศัพท์',
            'asset_status_id.required'=>'กรุณาระบุสถานะของครุภัณฑ์',
            'asset_use_status_id.required'=>'กรุณาระบุสถานะการใช้งานของครุภัณฑ์',
            'brand.required'=>'กรุณาระบุยี่ห้อ',
            'model.required'=>'กรุณาระบุรุ่น',
            'serial_no.required'=>'กรุณาระบุ serial number',
            'display_size.required'=>'กรุณาระบุขนาดจอภาพ',
            'display_ratio_id.required'=>'กรุณาระบุสัดส่วนภาพ',
        ];

        return $this->validate($data, $rules, $messages);
    }
}
