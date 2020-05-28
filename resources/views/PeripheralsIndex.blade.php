@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>ตารางบัญชีอุปกรณ์ต่อพ่วง</h4>
                </div>
                <div class="card-body">
                <a href="{{ url('/peripherals') }}" class="btn btn-primary btn-info btn-block btn-lg" role="button">เพิ่มอุปกรณ์ต่อพ่วง</a>
                    <table class="table mt-4 table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ลำดับที่</th>
                                <th scope="col">ชนิด</th>
                                <th scope="col">SAP</th>
                                <th scope="col">รหัสครุภัณฑ์</th>
                                <th scope="col">ที่มา</th>
                                <th scope="col">หน่วยงาน</th>
                                <th scope="col">ลักษณะการติดตั้ง</th>
                                <th scope="col">สถานะทางทะเบียนครุภัณฑ์</th>
                                <th scope="col">สถานะการใช้งานครุภัณฑ์</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peripherals as $peripheral)
                            <tr>
                                <th scope="row">{{ $peripheral['id'] }}</th>
                                <td>{{ $peripheral->peripheraltype->name }}</td>
                                <td>{{ $peripheral['sapid'] }}</td>
                                <td>{{ $peripheral['pid'] }}</td>
                                <td>{{ $peripheral->peripheralowner->name }}</td>
                                <td>{{ $peripheral->peripheralsection->name }}</td>
                                <td>{{ $peripheral->PeripheralMobility->name }}</td>
                                <td>{{ $peripheral->PeripheralAssetStatus->name }}</td>
                                <td>{{ $peripheral->PeripheralAssetUseStatus->name }}</td>
                                <td><a href="{{ url('/peripheral',$peripheral->id) }}" class="btn btn-sm btn-info" role="button">แก้ไข</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $peripherals->links() }}
                </div>
            </div>
        </div>   
    </div> 
@endsection