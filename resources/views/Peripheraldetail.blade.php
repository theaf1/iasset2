@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
        <h3 class="mt-4">รายละเอียด {{$peripheral->peripheraltype->name}} หมายเลข {{$peripheral['id'] }}</h3>
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
                </div>
            </div>
        </div>
    </div>
@endsection