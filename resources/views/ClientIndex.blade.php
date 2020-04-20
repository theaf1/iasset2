@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>ตารางบัญชีคอมพิวเตอร์</h4>
                </div>
                <div class="card-body">
                    <table class="table mt-4 table-hover">
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
                            @foreach ($clients as $client)
                                <tr>
                                    <th scope="row">{{ $client['id'] }}</th>
                                    <td>{{ $client['type'] }}</td>
                                    <td>{{ $client['sapid'] }}</td>
                                    <td>{{ $client['pid'] }}</td>
                                    <td>{{ $client['is_mobile'] }}</td>
                                    <td>{{ $client['asset_status'] }}</td>
                                    <td>{{ $client['asset_use_status'] }}</td>
                                    <td><a href="{{ url('/client',$client->id) }}" class="btn btn-sm btn-info" role="button">แก้ไข</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection