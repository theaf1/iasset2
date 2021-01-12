@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>ข้อมูลทั่วไป</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>รหัส SAP: {{$server['sapid'] == null ? 'ไม่มี' : $server['sapid']}}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>รหัสครุภัณฑ์: {{$server['pid'] == null ? 'ไม่มี' : $server['pid']}}</p>   
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>ที่ตั้ง: {{$server->ServerRoom->name}} ชั้น {{$server->ServerRoom->location->floor}} ตึก{{$server->ServerRoom->location->building->name}}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>{{$server->ServerMobility->name}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>ผู้รับผิดชอบ: {{$server['response_person']}}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>หน่วยงาน: {{$server->ServerSection->name}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>หมายเลขโทรศัพท์: {{$server['tel_no']}}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>ที่มา: {{$server->ServerOwner->name}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>ครุภัณฑ์{{$server->ServerAssetStatus->name}}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>ครุภัณฑ์{{$server->ServerAssetUseStatus->name}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>รายละเอียด</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>ยี่ห้อ: {{$server['brand']}}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>รุ่น: {{$server['model']}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>Serial number: {{$server['serial_no']}}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <p>เป็นเครื่องแบบ {{$server['form_factor']}}</p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>CPU: {{$server['cpu_model']}}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>ความเร็ว {{$server['cpu_speed'] }} GHz</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>มี socket CPU {{$server['cpu_socket_no'] }} socket</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>RAM {{$server['ram_size']}} GB</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>{{$server['is_raid'] == 1 ? 'มี' : 'ไม่มี'}} RAID</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>มี Hard Disk ได้สูงสุด {{$server['no_of_physical_drive_max']}} ลูก</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>มี Hard Disk ใช้งานอยู่ {{$server['no_of_physical_drive_populated']}} ลูก</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group">
                                <p>มี disk จำลอง {{$server['lun_count']}} ลูก</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group">
                                <p>ความจุรวมทั้งสิ้น {{$server['hdd_total_cap']}} {{$server->ServerDataUnit->name}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card pt-1 pb-1">
                        <div class="card-header card-background text-white">
                            <h5>จอภาพ</h5>
                        </div>
                        <div class="card-body">
                            @foreach ($server->ServerDisplay as $display)
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
                    <h4>รายละเอียด Software</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>ระบบปฏิบัติการ: {{$server->ServerOs->name}}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>โครงสร้างภายใน: {{$server['os_arch'] == 1 ? '64 Bit' : '32 Bit'}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>กลุ่มของบทบาท: {{$server->ServerRoleClass->name}}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <label for="role_subclass">บทบาท</label>
                                <p>{{$server['is_ad'] == 1 ? 'Active Directory' : ''}}</p>
                                <p>{{$server['is_dns'] == 1 ? 'DNS' : ''}}</p>
                                <p>{{$server['is_dhcp'] == 1 ? 'DHCP' : ''}}</p>
                                <p>{{$server['is_fileshare'] == 1 ? 'File Server' : ''}}</p>
                                <p>{{$server['is_web'] == 1 ? 'Web Server' : ''}}</p>
                                <p>{{$server['is_db'] == 1 ? 'Database Server' : ''}}</p>
                                <p>{{$server['is_log'] == 1 ? 'Log Server' : ''}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>{{$server['other_software'] == 1 ? 'มี' : 'ไม่มี'}} Software อื่นๆ</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>รายชื่อ Software อื่นๆ: {{$server['other_software_detail'] == null ? 'ไม่มี' : $server['other_software_detail']}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>รายละเอียดด้านเครือข่าย</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>ประเภทเครือข่าย: {{$server->ServerNetworkConnection->name}}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>ชื่อเครื่องในเครือข่าย: {{$server['computer_name']}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>IP Address: {{$server['ip_address']}}</p>
                            </div>
                        </div>
                        <div class="col sm-12 col-lg-6">
                            <div class="form-group">
                                <p>MAC Address: {{$server['mac_address']}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>LAN Outlet: {{$server['lan_outlet_no']}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>หมายเหตุและปัญหาในการใช้งาน</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <label for="remarks">หมายเหตุ</label><br>
                                {{$server['remarks']}}
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <label for="issues">ปัญหาในการใช้งาน</label><br>
                                {{$server['issues']}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="{{ url('/servers') }}" class="btn btn-lg btn-info" role="button">ย้อนกลับ</a>
            </div>
        </div>
    </div>
@endsection