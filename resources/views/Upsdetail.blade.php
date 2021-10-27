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
                                <p>รหัส SAP: {{$ups['sapid']}}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>รหัสครุภัณฑ์: {{ $ups['pid'] }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>ตั้งอยู่ที่ {{$ups->UpsRoom->name}} ชั้น {{ $ups->UpsRoom->Location->floor }} ตึก {{ $ups->UpsRoom->Location->building->name }}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>ที่มา: {{$ups->UpsOwner->name}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                {{$ups->UpsMobility->name}}
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group">
                                <p>ผู้รับผิดชอบ: {{ $ups['response_person'] }}</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group">
                                <p>หน่วยงาน: {{ $ups->UpsSection->name }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-4 col-lg3">
                            <div class="form-group">
                                <p>หมายเลขโทรศัพท์: {{ $ups['tel_no'] }}</p>
                            </div>
                        </div>
                        <div class="col-sm-4 col-lg-3">
                            <div class="form-group">
                                <p>ครุภัณฑ์{{$ups->UpsAssetStatus->name}}</p>
                            </div>
                        </div>
                        <div class="col-sm-4 col-lg-3">
                            <div class="form-group">
                                <p>ครุภัณฑ์{{$ups->UpsAssetUseStatus->name}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>รายละเอียดของครุภัณฑ์</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>ยี่ห้อ: {{ $ups['brand'] }}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>รุ่น: {{ $ups['model'] }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>serial number: {{ $ups['serial_no'] }}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>ลัษณะตัวเครื่อง: {{ $ups->UpsFormFactor->name }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>หลักการทำงาน: {{$ups->UpsTopology->name}}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <p>กำลังไฟสูงสุด {{ $ups['capacity'] }} KVA</p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-4 col-lg-3">
                            <div class="form-group">
                                <p>เปลี่ยนกำลังไฟสูงสุด{{ $ups['is_modular'] == 1 ? 'ได้' : 'ไม่ได้' }}</p>
                            </div>
                        </div>
                        <div class="col-sm-4 col-lg-3">
                            <div class="form-group">
                                <p>ใช้แบตเตอรี่{{$ups->UpsBatteryType->name}}</p>
                            </div>
                        </div>
                        <div class="col-sm-4 col-lg-3">
                            <div class="form-group">
                                <p>{{ $ups['has_external_battery'] == 1 ? 'มี' : 'ไม่มี' }}แบตเตอรี่ภายนอก</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>IP Address ที่ใช้ควบคุมเครื่อง: {{ $ups['device_management_address'] }}</p>
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
                                <label for="issues">ปัญหาในการใช้งาน</label><br>
                                {{ $ups['issues'] }}
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <label for="remarks">หมายเหตุ</label><br>
                                {{ $ups['remarks'] }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="{{url('/upses')}}" class="btn btn-info btn-lg mb-4" role="button">ย้อนกลับ</a>
            </div>
        </div>
    </div>
@endsection