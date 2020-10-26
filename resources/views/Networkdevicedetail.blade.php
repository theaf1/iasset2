@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>ข้อมูลพื้นฐานของครุภัณฑ์</h4>
                </div>
                <div class="card-body">   
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>รห้ส SAP</p>
                                {{$networkdevice['sapid']}}
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>รหัสครุภัณฑ์ {{$networkdevice['pid']}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>ห้อง</p>
                                {{$networkdevice->NetworkDeviceRoom->name}}
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>ชั้น</p>
                                {{$networkdevice->NetworkDeviceRoom->Location->floor}}
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>ตึก</p>
                                {{$networkdevice->NetworkDeviceRoom->Location->building->name}}
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>ลักษณะการติดตั้ง</p>
                                {{$networkdevice->NetworkDeviceMobility->name}}
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>หน่วยงาน</p>
                                {{$networkdevice->NetworkDeviceSection->name}}
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group">
                                <p>ผู้รับผิดชอบ</p>
                                {{$networkdevice['response_person']}}
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group">
                                <p>หมายเลขโทรศัพท์</p>
                                {{$networkdevice['tel_no']}}
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>ที่มา</p>
                                {{$networkdevice->NetworkDeviceOwner->name}}
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group">
                                <p>สถานะทางทะเบียนครุภัณฑ์</p>
                                {{$networkdevice->NetworkDeviceAssetStatus->name}}
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group">
                                <p>สถานะการใช้งานของครุภัณฑ์</p>
                                {{$networkdevice->NetworkDeviceAssetUseStatus->name}}
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

                </div>
            </div>
        </div>
    </div>
@endsection