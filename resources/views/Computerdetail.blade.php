@extends('Layouts.app')
@section('content')
    <div class="containter-fluid">
        <div class="col-12 mx-auto">
            <H3 class="mt-4">รายละเอียด {{$client->ClientType->name}} หมายเลข {{$client['id']}} </H3>
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>ข้อมูลครุภัณฑ์พื้นฐาน</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>รหัส SAP: {{$client['sapid']}}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>รหัสครุภัณฑ์: {{$client['pid']}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <P>สถานที่ตั้ง: {{$client->ClientRoom->name}}</P>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group">
                                <P>ชั้น: {{$client->ClientRoom->location->floor}}</P>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group">
                                <p>ตึก: {{$client->ClientRoom->location->building->name}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group">
                                <p>ลักษณะการติดตั้ง: {{$client->ClientMobility->name}}</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group">
                                <p>ที่มา: {{$client->ClientOwner->name}}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>ระบบงาน: {{$client->ClientOpsFunction->name}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group">
                                <p>ผู้{{$client->ClientMultiUser->name}}</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group">
                                <p>ชื่อผู้ใช้งาน: {{$client['user']}}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>ตำแหน่ง: {{$client->ClientPosition->name}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>หน่วยงาน: {{$client->clientsection->name}}</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group">
                                <p>หมายเลขโทรคัพท์: {{$client['tel_no']}}</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <p>{{$client['permission'] == 1 ? 'มี' : 'ไม่มี'}}สิทธ์ Admin</p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm12 col-lg-6">
                            <div class="form-group">
                                <p>ครุภัณฑ์{{$client->ClientAssetStatus->name}}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>สถานะการใช้งานของครุภัณท์: {{$client->ClientAssetUseStatus->name}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>hardware</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group">
                                <p>ยี่ห้อ: {{$client['brand']}}</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group">
                                <p>รุ่น: {{$client['model']}}</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group">
                                <p>Serial Number: {{$client['serial_no']}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group">
                                <p>CPU: {{$client['cpu_model']}}</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group">
                                <p>ความเร็ว CPU {{$client['cpu_speed']}} GHz</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group">
                                <p>มี cpu {{$client['cpu_socket_number']}} ตัว</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>ปริมาณหน่วยความจำภายในเครื่อง {{$client['ram_size']}} GB</p> 
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>มี HDD {{$client['hdd_no']}} ลูก ความจุรวมทั้งสิ้น {{$client['hdd_total_cap']}} {{$client->ClientDataUnit->name}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card pt-1 pb-1">
                        <div class="card-header card-background text-white">
                            <h5>จอภาพ</h5>
                        </div>
                        <div class="card-body">
                            @foreach ($client->displays as $display)
                                <div class="form-row">
                                    <div class="col-sm-12 col-lg-3">
                                        <div class="form-group">
                                            <p>รห้ส SAP: {{$display['display_sapid']}}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-3">
                                        <div class="form-group">
                                            <p>รหัสครุภัณฑ์: {{$display['display_pid']}}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-3">
                                        <div class="form-group">
                                            <p>ขนาด {{$display['display_size']}} นิ้ว</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-3">
                                        <div class="form-group">
                                            <p>สัดส่วนจอภาพ: {{$display['display_ratio']}}</p>
                                        </div>
                                    </div>                            
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>  
            </div>
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>software</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>ระบบปฏิบัติการ: {{$client['os']}}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>โครงสร้างภายใน: {{$client['os_arch'] == 0 ? '32 bit' : '64 bit'}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>Microsoft Office: {{$client['ms_office_version']}}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>Antivirus: {{$client['antivirus']}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>PDF Reader: {{$client['pdf_reader']}}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>Endnote version: {{$client['endnote_version'] == null ? 'ไม่มี' : $client['endnote_version']}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>IE Version: {{$client['ie_version']}}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>Firefox Version: {{$client['firefox_version'] == null ? 'ไม่มี' : $client['firefox_version']}}
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>Chrome version: {{$client['chrome_version']}}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>SPSS version: {{$client['spss_version'] == null ? 'ไม่มี' : $client['spss_version']}}
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>Software คณะ</p>
                                <ul>
                                    <li>{{$client['ehis'] == 1 ? 'มี' : 'ไม่มี'}} E-His</li>
                                    <li>{{$client['sipacs'] == 1 ? 'มี' : 'ไม่มี'}} SiPACS</li>
                                    <li>{{$client['si_iscan'] == 1 ? 'มี' : 'ไม่มี'}} SI-iScan</li>
                                    <li>{{$client['eclair'] == 1 ? 'มี' : 'ไม่มี'}} ECLAIR</li>
                                    <li>{{$client['admission_note'] == 1 ? 'มี' : 'ไม่มี'}} Admission Note</li>
                                    <li>{{$client['ur_ward'] == 1 ? 'มี' : 'ไม่มี'}} UR-Ward</li>
                                    <li>{{$client['sinet'] == 1 ? 'มี' : 'ไม่มี'}} SiNet</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm12 col-lg-6">
                            <div class="form-group">
                                <p>Software อื่นๆ: {{$client['other_software_detail'] == null ? 'ไม่มี' : $client['other_software_detail']}} 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>network</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>เครือข่าย: {{$client->networkconnection->name}}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>LAN Outlet Number: {{$client['lan_outlet_no']}}</p>
                            </div>
                        </div>
                        
                    </div>
                    <div class="form-row">
                        <div class="col-sm12 col-lg-6">
                            <div class="form-group">
                                <p>IP Address: {{$client['ip_address']}}
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group">
                                <p>MAC Address: {{$client['mac_address']}}
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group">
                                <p>ชื่อเครื่องในเครือข่าย: {{$client['computer_name']}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>หมายเหตุและปัญหาการใช้งาน</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-12">
                            <label for="issues">ปัญหาในการใช้งาน</label>
                            <p>{{$client['issues']}}</p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-12">
                            <label for="remarks">หมายเหตุ</label>
                            <p>{{$client['remarks']}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="{{url('/client')}}" class="btn btn-primary btn-lg btn-block" role="button">ย้อนกลับ</a>
            </div>
        </div>
    </div>
@endsection