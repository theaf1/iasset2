@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            @if ( $message = Session::get('success'))<!--แจ้งผลการบันทึกข้อมูล-->
                <div class="alert alert-success alert-dismissible text-center mt-4">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ $message }}
                </div>
            @endif
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>บัญชีเครื่องสำรองไฟฟ้า</h4>
                </div>
                <div class="card-body">
                <a href="{{ url('/ups') }}" class="btn btn-primary btn-info btn-block btn-lg" role="button">เพิ่มเครื่องสำรองไฟฟ้า</a>
                    <table class="table mt-4 table-hover table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">ลำดับที่</th>
                                <th scope="col">SAP</th>
                                <th scope="col">รหัสครุภัณฑ์</th>
                                <th scope="col">mobile</th>
                                <th scope="col">สถานะทางทะเบียนครุภัณฑ์</th>
                                <th scope="col">สถานะการใช้งานครุภัณฑ์</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($upses as $ups)
                            <tr>
                                <th scope="row">{{ $ups['id'] }}</th>
                                <td>{{ $ups['sapid'] }}</td>
                                <td>{{ $ups['pid'] }}</td>
                                <td>{{ $ups->UpsMobility->name }}</td>
                                <td>{{ $ups->UpsAssetStatus->name }}</td>
                                <td>{{ $ups->UpsAssetUseStatus->name }}</td>
                                <td><a class="btn btn-sm btn-info" role="button" href="{{ url('/ups',$ups->id) }}">แก้ไข</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $upses->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection