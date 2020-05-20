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
                                <th scope="col">ที่มา</th>
                                <th scope="col">หน่วยงาน</th>
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
                                <td>{{ $networkdevice->netsubtype->name }}</td>
                                <td>{{ $networkdevice['sapid'] }}</td>
                                <td>{{ $networkdevice['pid'] }}</td>
                                <td>{{ $networkdevice->NetworkDeviceOwner->name }}</td>
                                <td>{{ $networkdevice->NetworkDeviceSection->name }}</td>
                                <td>{{ $networkdevice->NetworkDeviceMobility->name }}</td>
                                <td>{{ $networkdevice->NetworkDeviceAssetStatus->name }}</td>
                                <td>{{ $networkdevice->NetworkDeviceAssetUseStatus->name }}</td>
                                <td><a class="btn btn-sm btn-info" role="button" href="{{ url('/networkdevices',$networkdevice->id) }}">แก้ไข</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $networkdevices->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection