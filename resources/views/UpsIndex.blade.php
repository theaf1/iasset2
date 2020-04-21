@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>บัญชีเครื่องสำรองไฟฟ้า</h4>
                </div>
                <div class="card-body">
                    <table class="table mt-4 table-hover">
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
                                <td>{{ $ups['is_mobile'] }}</td>
                                <td>{{ $ups['asset_status'] }}</td>
                                <td>{{ $ups['asset_use_status'] }}</td>
                                <td><a class="btn btn-sm btn-info" role="button" href="{{ url('/ups',$ups->id) }}">แก้ไข</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection