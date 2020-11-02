@extends('Layouts.app')
@section('content')
    <div class="containter-fluid">
        <div class="col-12 mx-auto">
            <H3 class="mt-4">รายละเอียด {{$client->ClientType->name}} หมายเลข {{$client['id']}} </H3>
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>คุณสมบัติทั่วไป</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>รหัส SAP {{$client['sapid']}}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <p>รหัสครุภัณฑ์ {{$client['pid']}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection