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
                </div>
            </div>
        </div>
    </div>
@endsection