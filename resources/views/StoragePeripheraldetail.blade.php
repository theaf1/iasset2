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
                                <p>รหัส SAP: {{ $storageperipheral['sapid'] == null ? 'ไม่มี' : $storageperipheral['sapid'] }}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>รหัสครุภัณฑ์: {{ $storageperipheral['pid'] == null ? 'ไม่มี' : $storageperipheral['pid'] }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>ที่ตั้ง: {{ $storageperipheral->StoragePeripheralRoom->name }} ชั้น: {{$storageperipheral->StoragePeripheralRoom->Location->floor}} ตึก{{$storageperipheral->StoragePeripheralRoom->Location->Building->name}}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>{{$storageperipheral->StorageperipheralMobility->name}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-3 col-lg-3">
                            <div class="form-group">
                                <p>หน่วยงาน: {{$storageperipheral->section->name}}</p>
                            </div>
                        </div>
                        <div class="col-sm-3 col-lg-3">
                            <div class="form-group">
                                <p>มีผู้{{$storageperipheral->StoragePeripheralMultiUser->name}}</p>
                            </div>
                        </div>
                        <div class="col-sm-3 col-lg-3">
                            <div class="form-group">
                                <p>ชื่อผู้ใช้งาน: {{$storageperipheral['user']}}</p>
                            </div>
                        </div>
                        <div class="col-sm-3 col-lg-3">
                            <div class="form-group">
                                <p>ตำแหน่ง: {{$storageperipheral->StoragePeripheralPosition->name}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>หมายเลขโทรศัพท์: {{$storageperipheral['tel_no']}}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>ที่มา: {{$storageperipheral->StoragePeripheralOwner->name}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>ครุภัณท์{{$storageperipheral->StoragePeripheralAssetStatus->name}}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>ครุภัณท์{{$storageperipheral->StoragePeripheralAssetUseStatus->name}}</p>
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
                                <p>ยี่ห้อ: {{$storageperipheral['brand']}}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>รุ่น: {{$storageperipheral['model']}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection