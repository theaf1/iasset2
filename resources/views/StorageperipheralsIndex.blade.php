@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>บัญชีอุปกรณ์ต่อพ่วงเก็บข้อมูล</h4>
                </div>
                <div class="card-body">
                    <a href="{{ url('/storage') }}" class="btn btn-lg btn-info" role="button">เพิ่มอุปกรณ์ต่อพ่วงเก็บข้อมูล</a>
                    <table class="table mt-4">
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
                            @foreach ($storageperipherals as $storageperipheral)
                                <tr>
                                <th scope="row">{{ $storageperipheral['id'] }}</th>
                                    <td>{{ $storageperipheral['sapid'] }}</td>
                                    <td>{{ $storageperipheral['pid'] }}</td>
                                    <td>{{ $storageperipheral->StorageperipheralOwner->name }}</td>
                                    <td>{{ $storageperipheral->StorageperipheralMobility->name }}</td>
                                    <td>{{ $storageperipheral->StoragePeripheralAssetStatus->name }}</td>
                                    <td>{{ $storageperipheral->StoragePeripheralAssetUseStatus->name }}</td>
                                <td><a href="{{ url('/storageperipheral',$storageperipheral->id) }}" class="btn btn-sm btn-info" role="button">แก้ไข</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $storageperipherals->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection