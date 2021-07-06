<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset_statuses;
use App\Asset_use_statuses;
use App\Section;
use App\NetworkedStorage;
use App\Owner;
use App\Mobility;
use App\DataUnit;
use App\Networkedstoragetype;
use Carbon\Carbon;

class NetworkedstorageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //ประกาศตัวแปรที่ใช้ใน controller
    public function index()
    {
        //กำหนดค่าตัวแปรที่ใช้ในการแสดงบัญชีอุปกรณ์เก็บข้อมูลเครือข่าย
        $Networkedstorages = $this->filterNetworkedStorage(request()->section_filter,request()->per_page);
        foreach ($Networkedstorages as $Networkedstorage) //แปลงรูปแบบวันที่แก้ไขข้อมูลให้เป็น ว-ด-ป 
        {
            $Networkedstorage_upd_eng = $Networkedstorage->updated_at->locale('th-th')->isoFormat('Do MMMM YYYY');
            $Networkedstorage_upd_ex = explode(' ', $Networkedstorage_upd_eng);
            $Networkedstorage_upd_year_th = (int)$Networkedstorage_upd_ex[2]+543;
            $Networkedstorage_upd_year = $Networkedstorage_upd_ex[0].' '.$Networkedstorage_upd_ex[1].' '.$Networkedstorage_upd_year_th;
            $Networkedstorage->update_date = $Networkedstorage_upd_year;
        }

        //ตัวแปรที่ส่งกลับไปยังหน้า NetworkedstorageIndex
        return view('NetworkedstorageIndex')->with([
            'networkedstorages'=>$Networkedstorages,
            'sections'=>Section::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Asset_statuses = Asset_statuses::all();
        $Asset_use_statuses = Asset_use_statuses::all();
        $Sections = Section::all();
        $DataUnits =DataUnit::all();
        $Owners = Owner::all();
        $Storagetypes = Networkedstoragetype::all();
        $Mobility = Mobility::all();
        $lastInternalSapId = NetworkedStorage::where('sapid', 'like', 'MED%')->orderBy('id', 'Desc')->first();

        if($lastInternalSapId == null)
        {
            $temp = 0;
        }
        else
        {
            $temp = $lastInternalSapId->sapid;
        }

        //ตัวแปรที่ส่งกลับไปยังหน้า addnetworkedstorage
        return view('addnetworkedstorage')->with([
            'asset_statuses'=>$Asset_statuses,
            'asset_use_statuses'=>$Asset_use_statuses,
            'sections'=>$Sections,
            'dataunits'=>$DataUnits,
            'owners'=>$Owners,
            'storagetypes'=>$Storagetypes,
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
    //บันทึกข้อมูลที่ได้รับจากหน้า addnetworkedstorage ผ่านตัวแปร request
    public function store(Request $request)
    {
        $this->validateData($request); //ตรวจสอบข้อมูลก่อนการบันทึกด้วย function validateData
        //return $request->all();
        $NetworkedStorage = NetworkedStorage::create($request->all());
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
        //กำหนดตัวแปรที่ใช้ในการแสดงรายละเอียดอุปกรณ์เก็บข้อมูลเครือข่าย
        $Asset_statuses = Asset_statuses::all();
        $Asset_use_statuses = Asset_use_statuses::all();
        $Sections = Section::all();
        $DataUnits =DataUnit::all();
        $Owners = Owner::all();
        $Storagetypes = Networkedstoragetype::all();
        $Mobility = Mobility::all();
        $NetworkedStorage = NetworkedStorage::find($id);

        //ตัวแปรที่ส่งกลับไปยังหน้า Networkedstoragedetail
        return view('Networkedstoragedetail')->with([
            'asset_statuses'=>$Asset_statuses,
            'asset_use_statuses'=>$Asset_use_statuses,
            'sections'=>$Sections,
            'dataunits'=>$DataUnits,
            'owners'=>$Owners,
            'storagetypes'=>$Storagetypes,
            'mobiles'=>$Mobility,
            'networkedstorage'=>$NetworkedStorage,

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
        //กำหนดตัวแปรที่ใช้ในการแก้ไขข้อมูลอุปกรณ์เก็บข้อมูลเครือข่าย
        $Asset_statuses = Asset_statuses::all();
        $Asset_use_statuses = Asset_use_statuses::all();
        $Sections = Section::all();
        $DataUnits =DataUnit::all();
        $Owners = Owner::all();
        $Storagetypes = Networkedstoragetype::all();
        $Mobility = Mobility::all();
        $networkedstorage = NetworkedStorage::find($id);
    
        //ตัวแปรที่ส่งไปยังหน้า editnetworkedstorage
        return view('editnetworkedstorage')->with([
            'networkedstorage'=>$networkedstorage,
            'asset_statuses'=>$Asset_statuses,
            'asset_use_statuses'=>$Asset_use_statuses,
            'sections'=>$Sections,
            'dataunits'=>$DataUnits,
            'owners'=>$Owners,
            'storagetypes'=>$Storagetypes,
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
        $this->validateData($request); //ตรวจสอบข้อมูลก่อนการแก้ไข
        Networkedstorage::find($id)->update($request->all()); //ค้นหาและแก้ไขข้อมูลในตาราง networked_storages
        return redirect('/networkedstorage')->with('success','แก้ไขข้อมูลสำเร็จแล้ว');
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
    
    private function validateData($data) //ตรวจสอบข้อมูลก่อนการบันทึก
    {
        //เงื่่อนไข
        $rules = [
            'sapid' => 'required',
            'pid' =>'nullable',
            'location_id' => 'required',
            'section_id' => 'required',
            'response_person' => 'required',
            'owner_id' => 'required',
            'tel_no' => 'required',
            'mobility_id' => 'required',
            'asset_status_id' => 'required',
            'asset_use_status_id' => 'required',
            'storage_type_id' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'serial_no' => 'required',
            'hdd_total_cap' => 'required',
            'data_unit_id' => 'required',
            'no_of_physical_drive_max' => 'required|gte:2',
            'no_of_physical_drive_populated' => 'required|lte:no_of_physical_drive_max',
            'device_name' => 'required',
            'device_management_address' => 'required|ipv4',
            'device_communication_address' => 'required',
        ];

        //ข้้อความแสดงข้อผิดพลาด
        $messages = [
            'sapid.required' => 'กรุณาใส่รหัส SAP',
            'location_id.required' => 'กรุณาระบุที่ตั้ง',
            'section.required' => 'กรุณาเลือกหน่วยงาน',
            'response_person.required' => 'กรุณาระบุผู้รับผิดชอบ',
            'owner.required' => 'กรุณาระบุที่มา',
            'tel_no.required' => 'กรุณาใส่หมายเลขโทรศัพท์',
            'mobility_id.required' => 'กรุณาระบุลักษณะการติดตั้ง',
            'asset_status.required' => 'กรุณาระบุสถานะทางทะเบียนครุภัณฑ์',
            'asset_use_status.required' => 'กรุณาระบุสถานะการใช้งานครุภัณฑ์',
            'storage_type_id.required' => 'กรุณาระบุชนิดของอุปกรณ์',
            'brand.required' => 'กรุณาระบุยี่ห้อ',
            'model.required' => 'กรุณาระบุรุ่น',
            'serial_no.required' => 'กรุณาระบุ Serial Number ของเครื่อง',
            'data_unit_id.required' => 'กรุณาเลือกหน่วยวัดข้อมูล',
            'hdd_total_cap.required' => 'กรุณาระบุความจุข้อมูล',
            'no_of_physical_drive_max.required' => 'กรุนาระบุจำนวน disk สูงสุดของเครื่อง',
            'no_of_physical_drive_max.lte' => 'test1.1',
            'no_of_physical_drive_populated.required' => 'กรุนาระบุจำนวน disk ในเครื่อง',
            'no_of_physical_drive_populated.lte' => 'จำนวน disk ในเครื่องไม่ถูกต้อง',
            'device_name.required' => 'กรุณาใส่ชื่อเครื่อง',
            'device_management_address.required' => 'กรุณาระบุ ip address ของเครื่อง',
            'device_management_address.ipv4' => 'กรุณาตรวจสอบ ip address ของเครื่องให้ถูกต้อง',
            'device_communication_address.required' =>'กรุณาระบุ address ที่ใช้รับส่งข้อมูลของเครื่อง',

        ];

        return $this->validate($data, $rules, $messages); //ส่งข้อผิดพลาดกลับไปยังหน้าเดิมหรือบันทึกข้อมูล
    }
    protected function filterNetworkedStorage ($section_filter, $per_page)
    {
        return NetworkedStorage::where('section_id',$section_filter)->paginate($per_page)->withQueryString([
            'section_filter'=>$section_filter,
            'per_page'=>$per_page,
        ]);
    }
}
