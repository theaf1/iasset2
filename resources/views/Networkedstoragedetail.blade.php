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
                                <p>รหัส SAP: {{ $networkedstorage['sapid'] == null ? 'ไม่มี' : $networkedstorage['sapid'] }}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>รหัสครุภัณฑ์: {{ $networkedstorage['pid'] == null ? 'ไม่มี' : $networkedstorage['pid'] }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>ที่ตั้ง: {{$networkedstorage->NetworkedStorageRoom->name}} ชั้น {{$networkedstorage->NetworkedStorageRoom->Location->floor}} ตึก{{$networkedstorage->NetworkedStorageRoom->Location->building->name}}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>{{$networkedstorage->NetworkedStorageMobility->name}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>ผู้รับผิดชอบ: {{$networkedstorage['response_person']}}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>หน่วยงาน: {{ $networkedstorage->NetworkedStorageSection->name }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>หมายเลขโทรศัพท์: {{$networkedstorage['tel_no']}}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>ที่มา: {{$networkedstorage->NetworkedStorageOwner->name}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg 6">
                            <div class="form-group">
                                <p>ครุภัณฑ์{{$networkedstorage->NetworkedStorageAssetStatus->name}}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>ครุภัณฑ์{{ $networkedstorage->NetworkedStorageAssetUseStatus->name }}</p>
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
                                <p>ยี่ห้อ: {{ $networkedstorage['brand'] }}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>รุ่น: {{$networkedstorage['model']}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>Serial number: {{$networkedstorage['serial_no']}}</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group">
                                <p>{{$networkedstorage->NetworkedStorageType->name}}</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group">
                                <p>ความจุข้อมูล {{$networkedstorage['hdd_total_cap']}} {{$networkedstorage->NetworkedStorageDataUnit->name}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>จำนวน Hard disk สูงสุดที่ยอมรับได้ {{$networkedstorage['no_of_physical_drive_max']}} ลูก</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>จำนวน Hard disk ที่มีอยู่ {{$networkedstorage['no_of_physical_drive_populated']}} ลูก</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>จำนวน Disk จำลอง {{$networkedstorage['lun_count']}} ลูก</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>ชื่อเครื่อง: {{$networkedstorage['device_name']}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>IP Address ที่ใช้ควบคุมเครื่อง: {{$networkedstorage['device_management_address']}}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>IP Address ที่ใช้รับส่งข้อมูล: {{$networkedstorage['device_communication_address']}}
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>ใช้ protocol {{$networkedstorage['is_smb'] == 1 ? 'SMB' : ''}} {{$networkedstorage['is_fc'] == 1 ? 'Fiber Channel' : ''}} {{$networkedstorage['is_iscsi'] == 1 ? 'iSCSI' : ''}} ในการสื่อสาร</p>
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
                                {{$networkedstorage['remarks']}}
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <label for="issues">ปัญหาในการใช้งาน</label><br>
                                {{$networkedstorage['issues']}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="{{ url('/networkedstorage') }}" class="btn btn-lg btn-block btn-info mb-4" role="button">ย้อนกลับ</a>
            </div>
        </div>
    </div>
@endsection