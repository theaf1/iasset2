@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            @foreach ($storageperipherals as $storageperipheral)
                <div class="card mt-4">
                    <div class="card-header card-background text-white">
                        <h4>ข้อมูลอุปกรณ์ต่อพ่วงเก็บข้อมูลหมายเลข {{$storageperipheral['id']}}</h4>
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
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <p>Serial number: {{$storageperipheral['serial_no']}}</p>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <p>ความจุข้อมูล {{$storageperipheral['total_capacity']}} {{$storageperipheral->StoragePeripheralDataUnit->name}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-6 col-lg-3">
                                <div class="form-group">
                                    <p>{{$storageperipheral['is_hotswap'] == 1 ? 'เป็น' : 'ไม่เป็น' }} อุปกรณ์ Hot Swap</p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="form-group">
                                    <p>จำนวน Hard Disk สุงสุดที่ยอมรับได้ {{$storageperipheral['no_of_physical_drive_max']}} ลูก</p>
                                </div>
                            </div>
                            <div class="col-sm-4 col-lg-2">
                                <div class="form-group">
                                    <p>จำนวน Hard Disk ที่มีอยู่ {{$storageperipheral['no_of_physical_drive_populated']}} ลูก</p>
                                </div>
                            </div>
                            <div class="col-sm-4 col-lg-2">
                                <div class="form-group">
                                    <p>จำนวน Disk จำลอง {{$storageperipheral['no_of_physical_drive_max']}} ลูก</p>
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
                                    {{ $storageperipheral['remarks'] }}
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="issues">ปัญหาในการใช้งาน</label><br>
                                    {{ $storageperipheral['issues'] }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="text-center mt-4">
                <p>ออกรายงานเมื่อวันที่ {{$now}} โดย {{Auth::user()->name}}</p>
                <a href="{{url('/reports')}}" class="btn btn-primary btn-lg mb-4" role="button">ย้อนกลับ</a>
            </div>
        </div>
    </div>
@endsection