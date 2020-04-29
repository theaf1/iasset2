@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>บัญชีคอมพิวเตอร์แม่ข่าย</h4>
                </div>
                <div class="card-body">
                    <table class="table mt-4 table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ลำดับที่</th>
                                <th scope="col">SAP</th>
                                <th scope="col">รหัสครุภัณฑ์</th>
                                <th scope="col">ที่มา</th>
                                <th scope="col">mobile</th>
                                <th scope="col">สถานะทางทะเบียนครุภัณฑ์</th>
                                <th scope="col">สถานะการใช้งานครุภัณฑ์</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($servers as $server)
                                <tr>
                                <th scope="row">{{ $server['id'] }}</th>
                                    <td>{{ $server['sapid'] }}</td>
                                    <td>{{ $server['pid'] }}</td>
                                    <td>{{ $server->ServerOwner->name }}</td>
                                    <td>{{ $server['is_mobile'] }}</td>
                                    <td>{{ $server->ServerAssetStatus->name }}</td>
                                    <td>{{ $server->ServerAssetUseStatus->name }}</td>
                                <td><a href="{{ url('/server',$server->id) }}" class="btn btn-sm btn-info" role="button">แก้ไข</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $servers->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection