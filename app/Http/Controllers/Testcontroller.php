<?php

namespace App\Http\Controllers;

use App\Client;
use App\Section;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Testcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //ตัวแปรที่ส่งไปยังหน้า clientindex
        $Clients =$this->filterClient(request()->section_filter,request()->per_page);
        foreach ($Clients as $Client) //แปลงรูปแบบวันที่แก้ไขข้อมูลให้อยู่ในรูปแบบ ว-ด-ป
        {
            $Client_upd_eng = $Client->updated_at->locale('th-th')->isoFormat('Do MMMM YYYY');
            $Client_upd_ex = explode(' ', $Client_upd_eng);
            $Client_upd_year_th = (int)$Client_upd_ex[2]+543;
            $Client_upd_year = $Client_upd_ex[0].' '.$Client_upd_ex[1].' '.$Client_upd_year_th;
            $Client->update_date = $Client_upd_year;
        }
        return view('clienttestindex')->with([
            'sections'=>Section::all(),
            'clients'=>$Clients,
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
    protected function filterClient ($section_filter, $per_page)
    {
        return Client::where('section_id',$section_filter)->paginate($per_page)->withQueryString([
            'section_filter'=>$section_filter,
            'per_page'=>$per_page,
        ]);
    }
}
