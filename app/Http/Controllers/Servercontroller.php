<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset_statuses;
use App\Asset_use_statuses;
use App\Section;
use App\Servers;
use App\Display;
use App\Formfactor;
use App\DataUnit;
use App\serverOp;
use App\OsArch;
use App\ServerRoleClass;
use App\NetworkConnection;
use App\Owner;
use App\Mobility;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //ประกาศตัวแปรที่ใช้ใน controller
    public function index()
    {
        //ตัวแปรที่ใช้ในการแสดงบัญชีคอมพิวเตอร์แม่ข่าย
        $Asset_statuses = Asset_statuses::all();
        $Asset_use_statuses = Asset_use_statuses::all();
        $Sections = Section::all();
        $ServerOSes = ServerOp::all();
        $ServerRoleClass = ServerRoleclass::all();
        $NetworkConnections = NetworkConnection::all();
        $Forms = Formfactor::all();
        $DataUnits = DataUnit::all();
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
        //ตัวแปรที่ใช้ในการสร้างข้อมูลคอมพิวเตอร์แม่ข่าย
        $Asset_statuses = Asset_statuses::all();
        $Asset_use_statuses = Asset_use_statuses::all();
        $Sections = Section::all();
        $ServerOSes = ServerOp::all();
        $ServerRoleClass = ServerRoleclass::all();
        $NetworkConnections = NetworkConnection::all();
        $Forms = Formfactor::all();
        $OsArches =OsArch::all();
        $DataUnits = DataUnit::all();
        $Owners = Owner::all();
        $Mobility = Mobility::all();
        $lastInternalSapId = Servers::where('sapid', 'like', 'MED%')->orderBy('id', 'Desc')->first();
        
        if($lastInternalSapId == null)
        {
            $temp = 0;
        }
        else
        {
            $temp = $lastInternalSapId->sapid;
        }

        //ตัวแปรที่ส่งไปยังหน้า addserver
        return view('addserver')->with([
            'asset_statuses'=>$Asset_statuses,
            'asset_use_statuses'=>$Asset_use_statuses,
            'sections'=>$Sections,
            'server_oses'=>$ServerOSes,
            'server_role_classes'=>$ServerRoleClass,
            'network_connections'=>$NetworkConnections,
            'forms'=>$Forms,
            'dataunits'=>$DataUnits,
            'os_arches'=>$OsArches,
            'owners'=>$Owners,
            'mobiles'=>$Mobility,
            'lastinternalsap'=>$temp,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //บันทึกข้อมูลที่ได้รับจากหน้า addserver ผ่านตัวแปร request
    public function store(Request $request)
    {
        //$this->validateData($request); //ตรวจสอบข้อมูลก่อนการบันทึกด้วย function validateData
        //return $request->all();
        //$Servers = Servers::create($request->all()); //เขียนข้อมูลลงฐานข้อมูล
        //return redirect()->back()->with('success','บันทึกข้อมูลเรียบร้อยแล้ว'); //ส่งผลการบันทึกข้อมูลกลับไปยังหน้าเดิม
        if (request()->has('displayCount')) //ตรวจสอบว่า มีค่า displayCount ส่งมาด้วย
        {
            $displayCount = request()->input('displayCount');
            return redirect()->back()->with('displayCount', $displayCount)->withInput();
        }
        $this->validateData($request); //ส่งข้อมูลไปตรวจสอบก่อนบันทึกด้วย function validateData
        //return $request->all();
        $Servers = Servers::create($request->all()); //บันทึกข้อมูลลงในตาราง servers

        $displayCount = request()->input('display_count'); //บันทึกข้อมูลจอภาพลงในตาราง displays จนครบถ้วน
        for ($i = 0; $i < $displayCount; $i++)
        {
            $display =  [ 
                            'client_id' => $Servers->id, 
                            'display_sapid' => request()->input('display_sapid')[$i],
                            'display_pid' => request()->input('display_pid')[$i],
                            'display_size' => request()->input('display_size')[$i],
                            'display_ratio' => request()->input('display_ratio')[$i],
                        ];
            Display::create($display);
        } 

        return redirect()->back()->with('displayCount',$displayCount);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //ตัวแปรที่ใช้ในการแก้ไขข้อมูลคอมพิวเตอร์แม่ข่าย
        $Server = Servers::find($id);
        $Asset_statuses = Asset_statuses::all();
        $Asset_use_statuses = Asset_use_statuses::all();
        $Sections = Section::all();
        $ServerOSes = ServerOp::all();
        $ServerRoleClass = ServerRoleclass::all();
        $NetworkConnections = NetworkConnection::all();
        $Forms = FormFactor::all();
        $DataUnits = DataUnit::all();
        $OsArches = OsArch::all();
        $Owners = Owner::all();
        $Mobility = Mobility::all();

        //ตัวแปรที่ส่งไปยังหน้า ServerDetail
        return view('ServerDetail')->with([
            'asset_statuses'=>$Asset_statuses,
            'asset_use_statuses'=>$Asset_use_statuses,
            'sections'=>$Sections,
            'server_oses'=>$ServerOSes,
            'server_role_classes'=>$ServerRoleClass,
            'network_connections'=>$NetworkConnections,
            'forms'=>$Forms,
            'dataunits'=>$DataUnits,
            'os_arches'=>$OsArches,
            'owners'=>$Owners,
            'mobiles'=>$Mobility,
            'server'=>$Server
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
        //ตัวแปรที่ใช้ในการแก้ไขข้อมูลคอมพิวเตอร์แม่ข่าย
        $Asset_statuses = Asset_statuses::all();
        $Asset_use_statuses = Asset_use_statuses::all();
        $Sections = Section::all();
        $ServerOSes = ServerOp::all();
        $ServerRoleClass = ServerRoleclass::all();
        $NetworkConnections = NetworkConnection::all();
        $Forms = Formfactor::all();
        $DataUnits = DataUnit::all();
        $OsArches = OsArch::all();
        $Owners = Owner::all();
        $Mobility = Mobility::all();

        $server = Servers::find($id);
        
        //ตัวแปรที่ส่งไปยังหน้า editserver
        return view('editserver')->with([
            'server'=>$server,
            'asset_statuses'=>$Asset_statuses,
            'asset_use_statuses'=>$Asset_use_statuses,
            'sections'=>$Sections,
            'server_oses'=>$ServerOSes,
            'server_role_classes'=>$ServerRoleClass,
            'network_connections'=>$NetworkConnections,
            'forms'=>$Forms,
            'dataunits'=>$DataUnits,
            'os_arches'=>$OsArches,
            'owners'=>$Owners,
            'mobiles'=>$Mobility,
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
        // $this->validateData($request);
        // Servers::find($id)->update($request->all());
        // return redirect('/servers')->with('success','แก้ไขข้อมูลเรียบร้อย');
        if (request()->has('displayCount')) //ตรวจสอบว่ามีค่า displayCount ส่งมาด้วย
        {
            $displayCount = request()->input('displayCount');
            return redirect()->back()->with('displayCount', $displayCount)->withInput();
        }
        
        $this->validateData($request); //ตรวจสอบข้อมูลที่แก้ไข
        
        $Servers = Servers::find($id)->update($request->all()); //ค้นหาและแก้ไขข้อมูลในตาราง servers
        $displayCount = request()->input('display_count'); //กำหนดค่าตัวแปร displayCount
        $Servers = Servers::find($id); //กำหนดค่าตัวแปร Servers
        $displaysId=$Servers->ServerDisplay;
        $i = 0;
        
        foreach ($displaysId as $displayId) //แก้ไขข้อมูลจอภาพในตาราง display จนครบถ้วน
        {    
            $display =  [ 
                            'client_id' => $Servers->id, 
                            'display_sapid' => request()->input('display_sapid')[$i],
                            'display_pid' => request()->input('display_pid')[$i],
                            'display_size' => request()->input('display_size')[$i],
                            'display_ratio' => request()->input('display_ratio')[$i],
                        ];
                $i++;                       
            Display::find($displayId->id)->update($display);
        }
        
        // return redirect()->back()->with('displayCount', $displayCount);
        return redirect('/servers')->with('success','แก้ไขข้อมูลสำเร็จแล้ว');
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

    // function ตรวจสอบข้อมูล
    private function validateData($data)
    {
        //เงื่อนไข
        $rules = [
            'sapid' => 'nullable|regex:/^[0-9]{12}+$/',
            'pid' => 'nullable',
            'location_id' => 'required',
            'section_id' => 'required',
            'tel_no' => 'required',
            'mobility_id' => 'required',
            'response_person' => 'required',
            'owner_id' => 'required',
            'asset_status_id' => 'required',
            'asset_use_status_id' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'serial_no' => 'required',
            'cpu_model' => 'required',
            'cpu_speed' => 'required',
            'cpu_socket_no' => 'required|gte:1',
            'ram_size' => 'required',
            'data_unit_id' => 'required',
            'display_count' => 'required',
            'no_of_physical_drive_max' => 'required_if:is_raid,1|gte:2',
            'no_of_physical_drive_populated' => 'required_if:is_raid,1|lte:no_of_physical_drive_max',
            'lun_count' => 'required_if:is_raid,1',
            'hdd_total_cap' => 'required',
            'os_id'=>'required',
            'role_class_id' => 'required',
            'other_software_detail' => 'required_if:other_software,1',
            'lan_type_id' => 'required',
            'ip_address' => 'required|ipv4',
            'mac_address' => 'required|regex:/^([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})$/'
        ];

        //ข้อความแสดงข้อผิดพลาด
        $messages = [
            'sapid.regex' => 'กรุณาใส่รหัส SAP ให้ถูกต้อง',
            'location_id.required' => 'กรุณาระบุสถานที่ตั้งเครื่อง',
            'section_id.required' => 'กรุณาเลือกหน่วยงาน',
            'tel_no.required' => 'กรุณาใส่หมาเลขโทรศัพท์',
            'mobility_id.required' => 'กรุณาระบุลักษณะการติดตั้ง',
            'owner_id.required' => 'กรุณาระบุที่มา',
            'response_person.required' => 'กรุณาใส่ชื่อผู้รับผิดชอบ',
            'asset_status_id.required' => 'กรุณาเลือกสถานะทางทะเบียนครุภัณฑ์',
            'asset_use_status_id.required' => 'กรุณาเลือกสถานะการใช้งานครุภัณฑ์',
            'brand.required' => 'กรุณาใส่ยี่ห้อ',
            'model.required' =>'กรุณใส่รุ่น',
            'serial_no.required' =>'กรุณาใส่ Serial No.',
            'cpu_model.required' => 'กรุณาระบุรุ่น CPU',
            'cpu_speed.required' => 'กรุณาระบุความเร็ว CPU',
            'cpu_socket_no.required' => 'โปรดระบุจำนวน socket CPU',
            'cpu_socket_no.gte' => 'โปรดตรวจสอบจำนวน socket CPU',
            'ram_size.required' => 'กรุณาใส่จำนวน RAM',
            'data_unit_id.required' => 'กรุณาเลือกหน่วยวัดข้อมูล',
            'display_count.required' => 'กรุณาระบุจำนวนจอภาพ',
            'no_of_physical_drive_max.required_if' => 'กรุณาระบุจำนวน disk สูงสุด',
            'no_of_physical_drive_max.gte' => 'จำนวน disk ไม่เพียงพอ',
            'no_of_physical_drive_populated.required_if' => 'กรุณาระบุจำนวน disk ที่มีอยู่',
            'no_of_physical_drive_populated.lte' => 'โปรดตรวจสอบจำนวน disk ในเครื่อง',
            'lun_count.required_if' =>'กรุณาระบุจำนวน disk จำลอง',
            'hdd_total_cap.required' => 'กรุณาระบุความจุข้อมูลรวมของเครื่อง',
            'os_id.required' => 'กรุณาเลือกระบบปฏิบัติการ',
            'role_class_id.required' =>'กรุณาเลื่อกกลุ่มงานของ server',
            'other_software_detail.required_if' => '1',
            'lan_type_id.required' => 'กรุณาเลือกประเภทเครือข่าย', 
            'ip_address.required' =>'กรุณาใส่ IP Address',
            'ip_address.ipv4' =>'โปรดตรวจสอบ IP Address',
            'mac_address.required'=>'กรุณาใส่ MAC Address',
            'mac_address.regex'=>'โปรดตรวจสอบ MAC Address',       
        ];

        return $this->validate($data, $rules, $messages); //ส่งข้อผิดพลาดกลับไปยังหน้า addserver หรือส่งข้อมูลไปบันทึก
    }
}