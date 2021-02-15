<?php

namespace App\Http\Controllers;
use App\Asset_statuses;
use App\Asset_use_statuses;
use App\Section;
use App\Client;
use App\Display;
use App\Clienttype;
use App\Opsfunction;
use App\Multiuser;
use App\DataUnit;
use App\NetworkConnection;
use App\Owner;
use App\Mobility;
use App\Position;
use App\OsArch;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //ประกาศตัวแปรที่่ใช้ใน controller
    public function index()
    {
        $Asset_statuses = Asset_statuses::all();
        $Asset_use_statuses = Asset_use_statuses::all();
        $Sections = Section::all();
        $Clienttypes = Clienttype::all();
        $Opsfunctions = Opsfunction::all();
        $Multiusers = Multiuser::all();
        $NetworkConnections = NetworkConnection::all();
        $Positions = Position::all();
        $DataUnits = DataUnit::all();
        $OsArches = OsArch::all();
        $Owners = Owner::all();
        $Mobility = Mobility::all();
        $lastInternalSapId = Client::where('sapid', 'like', 'MED%')->orderBy('id', 'Desc')->first();
        
        if($lastInternalSapId == null)
        {
            $temp = 0;
        }
        else
        {
            $temp = $lastInternalSapId->sapid;
        }
            
        //ตัวแปรที่ส่งกลับไปยังหน้า addcomputer

        return view('addcomputer')->with([
            'asset_statuses'=>$Asset_statuses,
            'asset_use_statuses'=>$Asset_use_statuses,
            'sections'=>$Sections,
            'clienttypes'=>$Clienttypes,
            'opsfunctions'=>$Opsfunctions,
            'multiusers'=>$Multiusers,
            'networkconnections'=>$NetworkConnections,
            'positions'=>$Positions,
            'os_arches'=>$OsArches,
            'dataunits'=>$DataUnits,
            'owners'=>$Owners,
            'mobiles'=>$Mobility,
            'lastinternalsap'=>$temp,
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
    //บันทึกข้อมูลที่ได้รับจากหน้า addcomputer ผ่านทางตัวแปร request
    public function store(Request $request)
    {
        if (request()->has('displayCount')) {
            $displayCount = request()->input('displayCount');
            return redirect()->back()->with('displayCount', $displayCount)->withInput();
        }
        $this->validateData($request); //ส่งข้อมูลไปตรวจสอบก่อนบันทึกด้วย function validateData
        $client = Client::create($request->all());//บันทึกข้อมูลลงตาราง Clients
        //\Log::info(session());

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
            Display::create($display); //บันทึกข้อมูลลงตาราง Displays
        } 

        return redirect()->back()->with('displayCount',$displayCount);
        //return redirect('/addcomputer')->with('success','บันทึกข้อมูลเรียบร้อยแล้ว')
        
         //return redirect()->back()->with('success','บันทึกข้อมูลเรียบร้อยแล้ว');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    //กำหนดค่าตัวแปรที่ใช้ในการเรียกดูรายละเอียดของเครื่องคอมพิวเตอร์
    {
        $Asset_statuses = Asset_statuses::all();
        $Asset_use_statuses = Asset_use_statuses::all();
        $Sections = Section::all();
        $Clienttypes = Clienttype::all();
        $Opsfunctions = Opsfunction::all();
        $Multiusers = Multiuser::all();
        $NetworkConnections = NetworkConnection::all();
        $Positions = Position::all();
        $DataUnits = DataUnit::all();
        $OsArches = OsArch::all();
        $Owners = Owner::all();
        $Mobility = Mobility::all();

        $client = Client::find($id);
        //ส่งค่าตัวแปรที่กำหนดไว้ไปยังหน้า Computerdetail
        return view('Computerdetail')->with([
            'client'=>$client,
            'asset_statuses'=>$Asset_statuses,
            'asset_use_statuses'=>$Asset_use_statuses,
            'sections'=>$Sections,
            'clienttypes'=>$Clienttypes,
            'opsfunctions'=>$Opsfunctions,
            'multiusers'=>$Multiusers,
            'networkconnections'=>$NetworkConnections,
            'positions'=>$Positions,
            'dataunits'=>$DataUnits,
            'os_arches'=>$OsArches,
            'owners'=>$Owners,
            'mobiles'=>$Mobility,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    //กำหนดค่าตัวแปรที่ใช้ในการแก้ไขข้อมูลคอมพิวเตอร์
    {
        $Asset_statuses = Asset_statuses::all();
        $Asset_use_statuses = Asset_use_statuses::all();
        $Sections = Section::all();
        $Clienttypes = Clienttype::all();
        $Opsfunctions = Opsfunction::all();
        $Multiusers = Multiuser::all();
        $NetworkConnections = NetworkConnection::all();
        $Positions = Position::all();
        $DataUnits = DataUnit::all();
        $OsArches = OsArch::all();
        $Owners = Owner::all();
        $Mobility = Mobility::all();

        $client = Client::find($id);
        //ตัวแปรที่ส่งไปยังหน้า editcomputer
        return view('editcomputer')->with([
            'client'=>$client,
            'asset_statuses'=>$Asset_statuses,
            'asset_use_statuses'=>$Asset_use_statuses,
            'sections'=>$Sections,
            'clienttypes'=>$Clienttypes,
            'opsfunctions'=>$Opsfunctions,
            'multiusers'=>$Multiusers,
            'networkconnections'=>$NetworkConnections,
            'positions'=>$Positions,
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
        //ตรวจสอบว่า request มีค่า displayCount หรือไม่
        if (request()->has('displayCount')) {
            $displayCount = request()->input('displayCount');
            return redirect()->back()->with('displayCount', $displayCount)->withInput();
        }
        
        $this->validateData($request); //ตรวจสอบว่าข้อมูลถูกต้อง
        
        $client = Client::find($id)->update($request->all()); //ทำการค้นหาและแก้ไขข้อมูลในตาราง Clients
        $displayCount = request()->input('display_count'); //กำหนดค่าตัวแปร displayCount
        $client = Client::find($id); //ค้นหาข้อมูล
        $displaysId=$client->displays; //กำหนดค่าตัวแปร displaysId
        $i = 0;
        
        foreach ($displaysId as $displayId) //แก้ไขข้อมูลจอภาพจนครบถ้วน
        {    
            $display =  [ 
                            'client_id' => $client->id, 
                            'display_sapid' => request()->input('display_sapid')[$i],
                            'display_pid' => request()->input('display_pid')[$i],
                            'display_size' => request()->input('display_size')[$i],
                            'display_ratio' => request()->input('display_ratio')[$i],
                        ];
                $i++;                       
            Display::find($displayId->id)->update($display);
        }
        
        // return redirect()->back()->with('displayCount', $displayCount);
        return redirect('/client')->with('success','แก้ไขข้อมูลสำเร็จแล้ว'); 
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
    //function ตรวจสอบข้อมูลก่อนการบันทึก
    private function validateData($data){
        $rules = [
            'type_id' =>'required',
            'sapid' => 'required',
            'pid' => 'nullable',
            'location_id' => 'required',
            'mobility_id' => 'required',
            'function_id' => 'required',
            'asset_status_id' => 'required',
            'asset_use_status_id' => 'required',
            'user' =>'required_if:multi_user,0',
            'section_id' => 'required',
            'owner_id' => 'required',
            'tel_no' => 'required',
            'permission' => 'required',
            'brand' => 'nullable',
            'model' => 'nullable',
            'serial_no' => 'nullable',
            'cpu_model' => 'required',
            'cpu_speed' => 'required',
            'cpu_speed' => 'max:99.99',
            'cpu_socket_number' =>'required',
            'ram_size' => 'required',
            'hdd_no' => 'required',
            'data_unit_id' =>'required',
            'hdd_total_cap'=>'required',
            'display_count' => 'required',
            'os'=>'required',
            'os_arch_id'=>'required',
            'ms_office_version'=>'required',
            'antivirus'=>'required',
            'pdf_reader'=>'required',
            'ie_version'=>'required',
            'chrome_version'=>'nullable',
            'spss_version'=>'nullable',
            'other_software_detail'=>'nullable',
            'lan_type_id'=>'required',
            'lan_outlet_no'=>'nullable',
            'ip_address'=>'required_unless:lan_type,1|bail|ipv4',
            'mac_address'=>'required_unless:lan_type,1|regex:/^([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})$/',
            'computer_name'=>'required',
            'remarks' => 'nullable',
            'issues' => 'nullable',
        ];

        $messages = [
            'type_id.required'=>'กรุณาระบุชนิดของครุภัณฑ์คอมพิวเตอร์',
            'sapid.required'=>'กรุณาตรวจสอบรหัส SAP',
            'location_id.required'=>'กรุณาระบุสถานที่ตั้งเเครื่อง',
            'mobility_id.required'=>'กรุณาระบุลักษณะการใช้งาน',
            'function_id.required'=>'กรุณาระบุระบบงานของเครื่อง',
            'asset_status_id.required'=>'กรุณาระบุสถานะของครุภัณฑ์',
            'asset_use_status_id.required'=>'กรุณาระบุสถานะการใช้งานของครุภัณฑ์',
            'user.required_if'=>'กรุณาระบุชื่อผู้ใช้งาน',
            'section_id.required'=>'กรุณาระบุหน่วยงาน',
            'owner_id.required'=>'กรุณาระบุเจ้าของเครือง',
            'tel_no.required'=>'กรุณาระบุหมายเลขโทรศัพท์',
            'permission.required'=>'กรุณาระบุสถานะของสิทธิ์ admin',
            'cpu_model.required'=>'กรุณาระบุยี่ห้อและรุ่นของ CPU',
            'cpu_speed.required'=>'กรุณาระบุความเร็วของ CPU',
            'cpu_speed.required'=>'กรุณาตรวจสอบความเร็วของ CPU',
            'cpu_socket_number.required'=>'กรุณาระบุจำนวน socket CPU',
            'ram_size.required'=>'กรุณาระบุขนาดของหน่วยความจำ',
            'hdd_no.required'=>'กรุณาระบุจำนวน hard disk ในเครื่อง',
            'data_unit_id.required' => 'กรุณาเลือกหน่วยวัดข้อมูล',
            'hdd_total_cap.required'=>'กรุณาระบุความจุข้อมูลรวมของเครื่อง',
            'display_count.required'=>'กรุณาระบุจำนวนจอภาพ',
            'os.required'=>'กรุณาระบุชื่อระบบปฏิบัติการ',
            'os_arch_id.required'=>'กรุณาระบุโครงสร้างระบบปฏิบัติการ',
            'ms_office_version.required'=>'กรุณาระบุรุ่นโปรแกรม Microsoft Office',
            'antivirus.required'=>'กรุณาระบุยี่ห้อและรุ่นโปรแกรม Antivirus',
            'pdf_reader.required'=>'กรุณาระบุยี่ห้อและรุ่นโปรแกรมอ่านไฟล์ PDF',
            'ie_version.required'=>'กรุณาาระบุรุ่นโปรแกรม Internet Explorer',
            'lan_type_id.required'=>'กรุณาเลือกประเภทเครือข่ายที่เชื่อมต่ออยู่',
            'ip_address.required_unless'=>'กรุณาใส่ IP Address',
            'ip_address.ipv4'=>'โปรดตรวจสอบควาามถูกต้องของ IP address',
            'mac_address.required_unless'=>'กรุณาใส่ MAC Address',
            'mac_address.regex'=>'โปรดตรวจสอบควาามถูกต้องของ MAC address',
            'computer_name.required'=>'กรุณาใส่ชื่อเครื่อง',
        ];

        return $this->validate($data, $rules, $messages); //ส่งข้อผิดพลาดกลับไปยังหน้า addcomputer หรือส่งข้อมูลไปบันทึก
    }
}
