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
                </div>
            </div>
        </div>
    </div>
@endsection