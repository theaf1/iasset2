<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset_statuses;
use App\Asset_use_statuses;
use App\Section;
use App\Servers;
use App\ServerOS;
use App\ServerRoleClass;
use App\NetworkConnection;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Asset_statuses = Asset_statuses::all();
        $Asset_use_statuses = Asset_use_statuses::all();
        $Sections = Section::all();
        $ServerOSes = ServerOS::all();
        $ServerRoleClass = ServerRoleclass::all();
        $NetworkConnections = NetworkConnection::all();
        $DataUnits = array(
            ['id'=>'1', 'name'=>'GB'],
            ['id'=>'2', 'name'=>'TB'],
        );

        return view('addserver')->with([
            'asset_statuses'=>$Asset_statuses,
            'asset_use_statuses'=>$Asset_use_statuses,
            'sections'=>$Sections,
            'server_oses'=>$ServerOSes,
            'server_role_classes'=>$ServerRoleClass,
            'network_connections'=>$NetworkConnections,
            'dataunits'=>$DataUnits,
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
        $this->validateData($request);
        //return $request->all();
        $Servers = Servers::create($request->all());
        return redirect()->back()->with('success','บันทึกข้อมูลเรียบร้อยแล้ว');
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

    private function validateData($data)
    {
        $rules = [
            'sapid' => 'nullable|regex:/^[0-9]{12}+$/',
            'pid' => 'nullable',
            'location_id' => 'required',
            'section' => 'required',
            'tel_no' => 'required',
            'response_person' => 'required',
            'asset_status' => 'required',
            'asset_use_status' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'serial_no' => 'required',
            'cpu_model' => 'required',
            'cpu_speed' => 'required',
            'cpu_socket_no' => 'required|gte:1',
            'ram_size' => 'required',
            'no_of_physical_drive_max' => 'required_if:is_raid,1|gte:2',
            'no_of_physical_drive_populated' => 'required_if:is_raid,1|lte:no_of_physical_drive_max',
            'lun_count' => 'required_if:is_raid,1',
            'hdd_total_cap' => 'required',
            'display_sapid' => 'nullable',
            'display_pid' => 'nullable',
            'os'=>'required',
            'other_software_detail' => 'required_if:other_software,1',
            'ip_address' => 'required|ipv4',
            'mac_address' => 'required|regex:/^([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})$/'
        ];

        $messages = [
            'sapid.regex' => 'กรุณาใส่รหัส SAP ให้ถูกต้อง',
            'location_id.required' => 'กรุณาระบุสถานที่ตั้งเครื่อง',
            'section.required' => 'กรุณาเลือกหน่วยงาน',
            'tel_no.required' => 'กรุณาใส่หมาเลขโทรศัพท์',
            'response_person.required' => 'กรุณาใส่ชื่อผู้รับผิดชอบ',
            'asset_status.required' => 'กรุณาเลือกสถานะทางทะเบียนครุภัณฑ์',
            'asset_use_status.required' => 'กรุณาเลือกสถานะการใช้งานครุภัณฑ์',
            'brand.required' => 'กรุณาใส่ยี่ห้อ',
            'model.required' =>'กรุณใส่รุ่น',
            'serial_no.required' =>'กรุณาใส่ Serial No.',
            'cpu_model.required' => 'กรุณาระบุรุ่น CPU',
            'cpu_speed.required' => 'กรุณาระบุความเร็ว CPU',
            'cpu_socket_no.required' => 'โปรดระบุจำนวน socket CPU',
            'cpu_socket_no.gte' => 'โปรดตรวจสอบจำนวน socket CPU',
            'ram_size.required' => 'กรุณาใส่จำนวน RAM',
            'no_of_physical_drive_max.required_if' => 'กรุณาระบุจำนวน disk สูงสุด',
            'no_of_physical_drive_max.gte' => 'จำนวน disk ไม่เพียงพอ',
            'no_of_physical_drive_populated.required_if' => 'กรุณาระบุจำนวน disk ที่มีอยู่',
            'no_of_physical_drive_populated.lte' => 'โปรดตรวจสอบจำนวน disk ในเครื่อง',
            'lun_count.required_if' =>'กรุณาระบุจำนวน disk จำลอง',
            'os.required' => 'กรุณาเลือกระบบปฏิบัติการ',
            'other_software_detail.required_if' => '1',
            'ip_address.required' =>'กรุณาใส่ IP Address',
            'ip_address.ipv4' =>'โปรดตรวจสอบ IP Address',
            'mac_address.required'=>'กรุณาใส่ MAC Address',
            'mac_address.regex'=>'โปรดตรวจสอบ MAC Address',       
        ];

        return $this->validate($data, $rules, $messages);
    }
}