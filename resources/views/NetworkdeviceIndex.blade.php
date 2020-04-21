@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>บัญชีอุปกรณ์เครือข่าย</h4>
                </div>
                <div class="card-body">
                    <table class="table mt-4">
                        <thead>
                            <tr>
                                <th scope="col">ลำดับที่</th>
                                <th scope="col">ชนิด</th>
                                <th scope="col">SAP</th>
                                <th scope="col">รหัสครุภัณฑ์</th>
                                <th scope="col">mobile</th>
                                <th scope="col">สถานะทางทะเบียนครุภัณฑ์</th>
                                <th scope="col">สถานะการใช้งานครุภัณฑ์</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($networkdevices as $networkdevice)
                            <tr>
                                <th scope="row">{{ $networkdevice['id'] }}</th>
                                <td>{{ $networkdevice['device_subtype'] }}</td>
                                <td>{{ $networkdevice['sapid'] }}</td>
                                <td>{{ $networkdevice['pid'] }}</td>
                                <td>{{ $networkdevice['is_mobile'] }}</td>
                                <td>{{ $networkdevice['asset_status'] }}</td>
                                <td>{{ $networkdevice['asset_use_status'] }}</td>
                                <td><a class="btn btn-sm btn-info" role="button" href="{{ url('/networkdevices',$networkdevice->id) }}">แก้ไข</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection