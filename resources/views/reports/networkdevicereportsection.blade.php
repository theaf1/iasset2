@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            @foreach($networkdevices as $networkdevice)
                <div class="card mt-4">
                    <div class="card-header card-background text-white">
                        <h4>ข้อมูลครุภัณฑ์ {{$networkdevice->netsubtype->name}} หมายเลข {{$networkdevice['id']}}</h4>
                    </div>
                    <div class="card-body">   
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <p>รห้ส SAP: {{$networkdevice['sapid'] == null ? 'ไม่มี' : $networkdevice['sapid']}}</p>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <p>รหัสครุภัณฑ์: {{$networkdevice['pid'] == null ? 'ไม่มี' : $networkdevice['pid']}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <p>ห้อง {{$networkdevice->NetworkDeviceRoom->name}} ชั้น {{$networkdevice->NetworkDeviceRoom->Location->floor}} ตึก{{$networkdevice->NetworkDeviceRoom->Location->building->name}}</p>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    {{$networkdevice->NetworkDeviceMobility->name}}
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <p>หน่วยงาน: {{$networkdevice->NetworkDeviceSection->name}}</p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="form-group">
                                    <p>ผู้รับผิดชอบ: {{$networkdevice['response_person']}}</p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="form-group">
                                    <p>หมายเลขโทรศัพท์: {{$networkdevice['tel_no']}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <p>ที่มา: {{$networkdevice->NetworkDeviceOwner->name}}</p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="form-group">
                                    <p>ครุภัณฑ์{{$networkdevice->NetworkDeviceAssetStatus->name}}</p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="form-group">
                                    <p>ครุภัณฑ์{{$networkdevice->NetworkDeviceAssetUseStatus->name}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-header card-background text-white">
                        <h4>ข้อมูลจำเพาะ</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-sm-6 col-lg-3">
                                <div class="form-row">
                                    <p>{{$networkdevice->netsubtype->name}}</p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="form-group">
                                    <p>ยี่ห้อ: {{$networkdevice['brand']}}</p>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <p>รุ่น: {{$networkdevice['model']}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <p>Serial Number: {{$networkdevice['serial_no'] }}</p>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <p>{{$networkdevice['is_modular'] == 1 ? 'สามารถ' : 'ไม่สามารถ'}}ขยายขนาดได้</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <p>มี {{$networkdevice['port_count']}} port</p>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <p>มี Power supply {{$networkdevice['psu_count']}} ตัว</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <p>IP address ที่ใช้ควบคุมเครื่อง: {{$networkdevice['device_management_address'] == null ? 'ไม่มี' : $networkdevice['device_management_address']}}</p>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <p>Software version: {{$networkdevice['software_version'] == null ? 'ไม่มี' : $networkdevice['software_version']}}</p>
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
                                    {{$networkdevice['remarks']}}
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="issues">ปัญหาในการใช้งาน</label><br>
                                    {{$networkdevice['issue']}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="text-center mt-4">
                <p>ออกรายงานเมื่อวันที่ {{$now}}</p>
                <a href="{{url('/reports')}}" class="btn btn-primary btn-lg mb-4" role="button">ย้อนกลับ</a>
            </div>
        </div>
    </div>
@endsection