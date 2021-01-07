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
                    <h4>xxx</h4>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
@endsection