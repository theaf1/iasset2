<?php

namespace App\Http\Controllers;
use App\Asset_statuses;
use App\Asset_use_statuses;
use App\Section;
use App\Client;
use App\Display;
use App\Clienttype;
use App\NetworkConnection;
use Illuminate\Http\Request;

class ClientController extends Controller
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
        $Clienttypes = Clienttype::all();
        $NetworkConnections = NetworkConnection::all();
        $Positions = array(
            ['id'=>'1','name'=>'แพทย์'],
            ['id'=>'2','name'=>'พยาบาล'],
            ['id'=>'3','name'=>'เจ้าหน้าที่'],
        );
        $DataUnits = array(
            ['id'=>'1', 'name'=>'GB'],
            ['id'=>'2', 'name'=>'TB'],
        );

        return view('addcomputer')->with([
            'asset_statuses'=>$Asset_statuses,
            'asset_use_statuses'=>$Asset_use_statuses,
            'sections'=>$Sections,
            'clienttypes'=>$Clienttypes,
            'networkconnections'=>$NetworkConnections,
            'positions'=>$Positions,
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
        if (request()->has('displayCount')) {
            $displayCount = request()->input('displayCount');
            return redirect()->back()->with('displayCount', $displayCount)->withInput();
        }
        $this->validateData($request);
        //$client = Client::create($request->all());

        $displayCount = request()->input('display_count');
        for ($i = 0; $i < $displayCount; $i++)
        {
            $display =  [ 
                            'client_id' => $client->id, 
                            'display_sapid' => request()->input('display_sapid')[$i],
                            'display_pid' => request()->input('display_pid')[$i],
                            'display_size' => request()->input('display_size')[$i],
                            'display_ratio' => request()->input('display_ratio')[$i],
                        ];
            Display::create($display);
        } 

        return redirect()->back()->with('displayCount', $displayCount)->withInput();


        // return redirect()->back()->with('success','บันทึกข้อมูลเรียบร้อยแล้ว');
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
    private function validateData($data){
        $rules = [
            'type' =>'required',
            'sapid' => 'nullable|regex:/^[0-9]{12}+$/',
            'pid' => 'nullable',
            'location_id' => 'required',
            'is_mobile' => 'required',
            'function' => 'required',
            'asset_status' => 'required',
            'asset_use_status' => 'required',
            'user' =>'required_if:multi_user,0',
            'section' => 'required',
            'owner' => 'required',
            'tel_no' => 'required',
            'permission' => 'required',
            'brand' => 'nullable',
            'model' => 'nullable',
            'serial_no' => 'nullable',
            'cpu_model' => 'required',
            'cpu_speed' => 'required',
            'cpu_socket_number' =>'required',
            'ram_size' => 'required',
            'hdd_no'=> 'required',
            'hdd_total_cap'=>'required',
            'display_count' => 'required',
            'os'=>'required',
            'os_arch'=>'required',
            'ms_office_version'=>'required',
            'antivirus'=>'required',
            'pdf_reader'=>'required',
            'ie_version'=>'required',
            'chrome_version'=>'nullable',
            'spss_version'=>'nullable',
            'other_software_detail'=>'nullable',
            'lan_type'=>'required',
            'lan_outlet_no'=>'nullable',
            'ip_address'=>'required_unless:lan_type,1|ipv4',
            'mac_address'=>'required_unless:lan_type,1|regex:/^([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})$/',
            'computer_name'=>'required',
            'remarks' => 'nullable',
            'issues' => 'nullable',
        ];

        $messages = [
            'type.required'=>'กรุณาระบุชนิดของครุภัณฑ์คอมพิวเตอร์',
            'sapid.regex'=>'กรุณาตรวจสอบรหัส SAP',
            'location_id.required'=>'กรุณาระบุสถานที่ตั้งเเครื่อง',
            'is_mobile.required'=>'กรุณาระบุลักษณะการใช้งาน',
            'function.required'=>'กรุณาระบุระบบงานของเครื่อง',
            'asset_status.required'=>'กรุณาระบุสถานะของครุภัณฑ์',
            'asset_use_status.required'=>'กรุณาระบุสถานะการใช้งานของครุภัณฑ์',
            'user.required_if'=>'กรุณาระบุชื่อผู้ใช้งาน',
            'section.required'=>'7กรุณาระบุหน่วยงาน',
            'owner.required'=>'กรุณาระบุเจ้าของเครือง',
            'tel_no.required'=>'กรุณาระบุหมายเลขโทรศัพท์',
            'permission.required'=>'กรุณาระบุสถานะของสิทธิ์ admin',
            'cpu_model.required'=>'กรุณาระบุยี่ห้อและรุ่นของ CPU',
            'cpu_speed.required'=>'กรุณาระบุความเร็วของ CPU',
            'cpu_socket_number.required'=>'กรุณาระบุจำนวน socket CPU',
            'ram_size.required'=>'กรุณาระบุขนาดของหน่วยความจำ',
            'hdd_no.required'=>'กรุณาระบุจำนวน hard disk ในเครื่อง',
            'hdd_total_cap.required'=>'กรุณาระบุความจุข้อมูลรวมของเครื่อง',
            'display_count.required'=>'กรุณาระบุจำนวนจอภาพ',
            'os.required'=>'กรุณาระบุชื่อระบบปฏิบัติการ',
            'os_arch.required'=>'กรุณาระบุโครงสร้างระบบปฏิบัติการ',
            'ms_office_version.required'=>'กรุณาระบุรุ่นโปรแกรม Microsoft Office',
            'antivirus.required'=>'กรุณาระบุยี่ห้อและรุ่นโปรแกรม Antivirus',
            'pdf_reader.required'=>'กรุณาระบุยี่ห้อและรุ่นโปรแกรมอ่านไฟล์ PDF',
            'ie_version.required'=>'กรุณาาระบุรุ่นโปรแกรม Internet Explorer',
            'lan_type.required'=>'กรุณาเลือกประเภทเครือข่ายที่เชื่อมต่ออยู่',
            'ip_address.required_unless'=>'กรุณาใส่ IP Address',
            'ip_address.ipv4'=>'โปรดตรวจสอบควาามถูกต้องของ IP address',
            'mac_address.required_unless'=>'กรุณาใส่ MAC Address',
            'mac_address.regex'=>'โปรดตรวจสอบควาามถูกต้องของ MAC address',
            'computer_name.required'=>'กรุณาใส่ชื่อเครื่อง',
        ];

        return $this->validate($data, $rules, $messages);
    }
}
