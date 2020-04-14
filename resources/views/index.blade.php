@extends('Layouts.app')
@section('header')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>กรุณาเลือกหน่วยงาน</h4>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 col-lg-6">
                        <div class="form-group">
                            <label for="section">หน่วยงาน</label>
                            <select class="form-control" id="section">
                                <option value="" hidden></option>
                                @foreach ($sections as $section)
                                    <option value="{{ $section['id'] }}">{{ $section['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>คอมพิวเตอร์</h4>
                </div>
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
                            <th scope="col">a</th>
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
                                <td>{{ $client['asset_use_status'] }}</td><td>
                                <button class="btn btn-sm btn-info">แก้ไข</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>อุปกรณ์ต่อพ่วง</h4>
                </div>
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
                            <th scope="col">a</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peripherals as $peripheral)
                        <tr>
                            <th scope="row">{{ $peripheral['id'] }}</th>
                            <td>{{ $peripheral['type'] }}</td>
                            <td>{{ $peripheral['sapid'] }}</td>
                            <td>{{ $peripheral['pid'] }}</td>
                            <td>{{ $peripheral['is_mobile'] }}</td>
                            <td>{{ $peripheral['asset_status'] }}</td>
                            <td>{{ $peripheral['asset_use_status'] }}</td>
                            <td><button class="btn btn-sm btn-info">แก้ไข</button></td>
                        </tr>
                        @endforeach
                       
                    </tbody>
                </table>
            </div>
            <div class="card mt-4 table-hover">
                <div class="card-header card-background text-white">
                    <h4>อุปกรณ์ต่อพ่วงเก็บข้อมูล</h4>
                </div>
                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th scope="col">ลำดับที่</th>
                            <th scope="col">SAP</th>
                            <th scope="col">รหัสครุภัณฑ์</th>
                            <th scope="col">mobile</th>
                            <th scope="col">สถานะทางทะเบียนครุภัณฑ์</th>
                            <th scope="col">สถานะการใช้งานครุภัณฑ์</th>
                            <th scope="col">a</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($storageperipherals as $storageperipheral)
                            <tr>
                            <th scope="row">{{ $storageperipheral['id'] }}</th>
                                <td>{{ $storageperipheral['sapid'] }}</td>
                                <td>{{ $storageperipheral['pid'] }}</td>
                                <td>{{ $storageperipheral['is_mobile'] }}</td>
                                <td>{{ $storageperipheral['asset_status'] }}</td>
                                <td>{{ $storageperipheral['asset_use_status'] }}</td>
                                <td><button class="btn btn-sm btn-info">แก้ไข</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>คอมพิวเตอร์แม่ข่าย</h4>
                </div>
                <table class="table mt-4 table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ลำดับที่</th>
                            <th scope="col">SAP</th>
                            <th scope="col">รหัสครุภัณฑ์</th>
                            <th scope="col">mobile</th>
                            <th scope="col">สถานะทางทะเบียนครุภัณฑ์</th>
                            <th scope="col">สถานะการใช้งานครุภัณฑ์</th>
                            <th scope="col">a</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($servers as $server)
                            <tr>
                            <th scope="row">{{ $server['id'] }}</th>
                                <td>{{ $server['sapid'] }}</td>
                                <td>{{ $server['pid'] }}</td>
                                <td>{{ $server['is_mobile'] }}</td>
                                <td>{{ $server['asset_status'] }}</td>
                                <td>{{ $server['asset_use_status'] }}</td>
                                <td><button class="btn btn-sm btn-info">แก้ไข</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card mt-4 table-hover">
                <div class="card-header card-background text-white">
                    <h4>อุปกรณ์เครือข่าย</h4>
                </div>
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
                            <th scope="col">a</th>
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
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>อุปกรณ์เก็บข้อมูลเครือข่าย</h4>
                </div>
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
                            <th scope="col">a</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($networkedstorages as $networkedstorage)
                            <tr>
                                <th scope="row">{{ $networkedstorage['id'] }}</th>
                                <td>{{ $networkedstorage['type'] }}</td>
                                <td>{{ $networkedstorage['sapid'] }}</td>
                                <td>{{ $networkedstorage['pid'] }}</td>
                                <td>{{ $networkedstorage['is_mobile'] }}</td>
                                <td>{{ $networkedstorage['asset_status'] }}</td>
                                <td>{{ $networkedstorage['asset_use_status'] }}</td>
                            <td><a href="{{ url('/networkedstorage',$networkedstorage->id) }}" class="btn btn-sm btn-info" role="button">แก้ไข</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>เครื่องสำรองไฟฟ้า</h4>
                </div>
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
@endsection 