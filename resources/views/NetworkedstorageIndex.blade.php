@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>บัญชีอุปกรณ์เก็บข้อมูลเครือข่าย</h4>
                </div>
                <div class="card-body">
                <a href="{{ url('/ns') }}" class="btn btn-lg btn-info" role="button">เพิ่มอุปกรณ์เก็บข้อมูลเครือข่าย</a>
                    <table class="table mt-4 table-hover">
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
                            @foreach ($networkedstorages as $networkedstorage)
                                <tr>
                                    <th scope="row">{{ $networkedstorage['id'] }}</th>
                                    <td>{{ $networkedstorage['type'] }}</td>
                                    <td>{{ $networkedstorage['sapid'] }}</td>
                                    <td>{{ $networkedstorage['pid'] }}</td>
                                    <td>{{ $networkedstorage->NetworkedStorageOwner->name }}</td>
                                    <td>{{ $networkedstorage->NetworkedStorageSection->name }}</td>
                                    <td>{{ $networkedstorage->NetworkedStorageMobility->name }}</td>
                                    <td>{{ $networkedstorage->NetworkedStorageAssetStatus->name }}</td>
                                    <td>{{ $networkedstorage->NetworkedStorageAssetUseStatus->name }}</td>
                                <td><a href="{{ url('/networkedstorage',$networkedstorage->id) }}" class="btn btn-sm btn-info" role="button">แก้ไข</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $networkedstorages->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection