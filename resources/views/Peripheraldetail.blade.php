@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>ข้อมูลครุภัณฑ์พื้นฐาน</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>รหัส SAP: {{$peripheral['sapid']}}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>รหัสครุภัณฑ์: {{$peripheral['pid'] == null ? 'ไม่มี' : $peripheral['pid']}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group">
                                <p>สถานที่ตั้ง: {{$peripheral->PeripheralRoom->name}}</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group">
                                <p>ชั้น: {{$peripheral->PeripheralRoom->location->floor}}</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group">
                                <p>ตึก: {{$peripheral->PeripheralRoom->location->building->name}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm 12 col-lg-6">
                            <div class="form-group">
                                <p>ลักษณะการติดตั้ง: {{$peripheral->PeripheralMobility->name}}</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group">
                                <p>หน่วยงาน: {{$peripheral->peripheralsection->name}}</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group">
                                <p>ที่มา: {{$peripheral->peripheralowner->name}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>ผู้ใช้งาน{{$peripheral->PeripheralMultiUser->name}}</p> 
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group">
                                <p>ชื่อผู้ใช้งาน: {{$peripheral['user']}}
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group">
                                <p>ตำแหน่ง: {{$peripheral->PeripheralPosition->name}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>หมายเลขโทรศัพท์ {{$peripheral['tel_no']}}</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group">
                                <p>สถานะของครุภัณฑ์: {{$peripheral->PeripheralAssetStatus->name}}</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group">
                                <p>สถานะการใช้งานครุภัณฑ์: {{$peripheral->PeripheralAssetUseStatus->name}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>รายละเอียดครุภัณฑ์</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>ชนิด: {{$peripheral->peripheraltype->name}}</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group">
                                <p>ยี่ห้อ: {{$peripheral['brand']}}</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group">
                                <p>รุ่น: {{$peripheral['model']}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>Serial Number: {{$peripheral['serial_no']}}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>{{$peripheral['supply_consumables']}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>วิธีการเชื่อมต่อ: {{$peripheral['connectivity']}}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>IP address: {{$peripheral['ip_address']}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm12 col-lg-6">
                            <div class="form-group">
                                <p>LAN outlet: {{$peripheral['lan_outlet_no']}}</p>
                            </div>
                        </div>
                        <div class="col-sm12 col-lg-6">
                            <div class="form-group">
                                <p>{{$peripheral['is_shared'] == 1 ? 'เป็น' : 'ไม่เป็น'}}เครื่องใช้งานร่วมกัน ด้วยวิธีการ {{$peripheral['share_method'] == 2 ? 'Network Share' : 'OS Share'}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <p>share name: {{$peripheral['share_name']}}</p>
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
                                <p>หมายเหตุ:</p>
                                <p>{{$peripheral['remarks']}}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>ปัญหาในการใช้งาน:</p>
                                <p>{{$peripheral['issues']}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="{{url('/peripheral')}}" class="btn btn-primary btn-lg btn-block" role="button">ย้อนกลับ</a>
            </div>
        </div>
    </div>
@endsection