<?php

namespace App\Http\Controllers;
use App\LooseDisplay;
use App\Owner;
use App\Section;
use App\Asset_statuses;
use App\Asset_use_statuses;
use App\Position;
use App\DisplayRatio;
use Carbon\Carbon;
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
        $LooseDisplays = $this->filterLooseDisplay(request()->section_filter,request()->per_page);
        foreach ($LooseDisplays as $LooseDisplay)
        {
            $LooseDisplay_upd_eng = $LooseDisplay->updated_at->locale('th-th')->isoFormat('Do MMMM YYYY');
            $LooseDisplay_upd_ex = explode(' ', $LooseDisplay_upd_eng);
            $LooseDisplay_upd_year_th = (int)$LooseDisplay_upd_ex[2]+543;
            $LooseDisplay_upd_year = $LooseDisplay_upd_ex[0].' '.$LooseDisplay_upd_ex[1].' '.$LooseDisplay_upd_year_th;
            $LooseDisplay->update_date = $LooseDisplay_upd_year;
        }
        return view('loosedisplayindex')->with([
            'sections'=>Section::all(),
            'loosedisplays'=>$LooseDisplays,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addloosedisplay')->with([
            'owners'=>Owner::all(),
            'sections'=>Section::all(),
            'asset_statuses'=>Asset_statuses::all(),
            'asset_use_statuses'=>Asset_use_statuses::all(),
            'positions'=>Position::all(),
            'displayratios'=>DisplayRatio::all(),
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
        $LooseDisplay = LooseDisplay::create($request->all());
        return redirect()->back()->with('success','บันทึกข้อมูลสำเร็จแล้ว');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $LooseDisplay = LooseDisplay::find($id);
        return view('loosedisplaydetail')->with([
            'loosedisplay'=>$LooseDisplay,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $LooseDisplay = LooseDisplay::find($id);
        return view('editloosedisplay')->with([
            'owners'=>Owner::all(),
            'sections'=>Section::all(),
            'asset_statuses'=>Asset_statuses::all(),
            'asset_use_statuses'=>Asset_use_statuses::all(),
            'positions'=>Position::all(),
            'displayratios'=>DisplayRatio::all(),
            'loosedisplay'=>$LooseDisplay,
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
    private function validateData ($data)
    {
        $rules = [
            'display_sapid'=>'required',
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
    protected function filterLooseDisplay ($section_filter, $per_page)
    {
        return LooseDisplay::where('section_id',$section_filter)->paginate($per_page)->withQueryString([
            'section_filter'=>$section_filter,
            'per_page'=>$per_page,
        ]);
    }
}
