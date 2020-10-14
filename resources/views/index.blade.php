@extends('Layouts.app')
@section('content')
    
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <H4 class="text-center">รายการเครื่องคอมพิวเตอร์ล่าสุด</H4>
                </div>
                <div class="card-body">
                    <table class="table mt-4 table-hover table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ลำดับที่</th>
                                <th scope="col">รหัส SAP</th>
                                <th scope="col">ชนิด</th>
                                <th scope="col">สถานที่</th>
                                <th scope="col">ชั้น</th>
                                <th scope="col">ตึก</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                                <tr>
                                    <th scope="row">{{ $client['id'] }}</th>
                                    <td>{{ $client['sapid'] }}</td>
                                    <td>{{$client->ClientType->name}}</td>
                                    <td>{{$client->ClientRoom->name }}</td>
                                    <td>{{$client->ClientRoom->location->floor}}</td>
                                    <td>{{$client->ClientRoom->location->building->name}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <H4 class="text-center">รายการอุปกรณ์ต่อพ่วงล่าสุด</H4>
                </div>
                <div class="card-body">
                    <table class="table mt-4 table-hover table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ลำดับที่</th>
                                <th scope="col">รหัส SAP</th>
                                <th scope="col">ชนิด</th>
                                <th scope="col">สถานที่</th>
                                <th scope="col">ชั้น</th>
                                <th scope="col">ตึก</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peripherals as $peripheral)
                                <tr>
                                    <th scope="row">{{ $peripheral['id'] }}</th>
                                    <td>{{ $peripheral['sapid'] }}</td>
                                    <td>{{$peripheral->peripheraltype->name}}</td>
                                    <td>{{$peripheral->PeripheralRoom->name}}</td>
                                    <td>{{$peripheral->PeripheralRoom->location->floor}}</td>
                                    <td>{{$peripheral->PeripheralRoom->location->building->name}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <H4 class="text-center">รายการอุปกรณ์ต่อพ่วงเก็บข้อมูลล่าสุด</H4>
                </div>
                <div class="card-body">
                    <table class="table mt-4 table-hover table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ลำดับที่</th>
                                <th scope="col">รหัส SAP</th>
                                <th scope="col">สถานที่</th>
                                <th scope="col">ชั้น</th>
                                <th scope="col">ตึก</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($storageperipherals as $storageperipheral)
                                <tr>
                                    <th scope="row">{{ $storageperipheral['id'] }}</th>
                                    <td>{{ $storageperipheral['sapid'] }}</td>
                                    <td>{{$storageperipheral->StoragePeripheralRoom->name}}</td>
                                    <td>{{$storageperipheral->StoragePeripheralRoom->location->floor}}</td>
                                    <td>{{$storageperipheral->StoragePeripheralRoom->location->building->name}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>    
            </div>
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <H4 class="text-center">รายการเครื่องคอมพิวเตอร์แม่ข่ายล่าสุด</H4>
                </div>
                <div class="card-body">
                    <table class="table mt-4 table-hover table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ลำดับที่</th>
                                <th scope="col">รหัส SAP</th>
                                <th scope="col">สถานที่</th>
                                <th scope="col">ชั้น</th>
                                <th scope="col">ตึก</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($servers as $server)
                                <tr>
                                    <th scope="row">{{ $server['id'] }}</th>
                                    <td>{{ $server['sapid'] }}</td>
                                    <td>{{$server->ServerRoom->name}}</td>
                                    <td>{{$server->ServerRoom->location->floor}}</td>
                                    <td>{{$server->ServerRoom->location->building->name}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>    
            </div>
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <H4 class="text-center">รายการอุปกรณ์เครือข่ายล่าสุด</H4>
                </div>
                <div class="card-body">
                    <table class="table mt-4 table-hover table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ลำดับที่</th>
                                <th scope="col">รหัส SAP</th>
                                <th scope="col">ชนิด</th>
                                <th scope="col">สถานที่</th>
                                <th scope="col">ชั้น</th>
                                <th scope="col">ตึก</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($networkdevices as $networkdevice)
                                <tr>
                                    <th scope="row">{{ $networkdevice['id'] }}</th>
                                    <td>{{ $networkdevice['sapid'] }}</td>
                                    <td>{{$networkdevice->netsubtype->name}}</td>
                                    <td>{{$networkdevice->NetworkDeviceRoom->name}}</td>
                                    <td>{{$networkdevice->NetworkDeviceRoom->location->floor}}</td>
                                    <td>{{$networkdevice->NetworkDeviceRoom->location->building->name}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>    
            </div>
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <H4 class="text-center">รายการอุปกรณ์เก็บข้อมูลเครือข่ายล่าสุด</H4>
                </div>
                <div class="card-body">
                    <table class="table mt-4 table-hover table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ลำดับที่</th>
                                <th scope="col">รหัส SAP</th>
                                
                                <th scope="col">สถานที่</th>
                                <th scope="col">ชั้น</th>
                                <th scope="col">ตึก</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($networkedstorages as $networkedstorage)
                                <tr>
                                    <th scope="row">{{ $networkedstorage['id'] }}</th>
                                    <td>{{ $networkedstorage['sapid'] }}</td>
                                    
                                    <td>{{$networkedstorage->NetworkedStorageRoom->name}}</td>
                                    <td>{{$networkedstorage->NetworkedStorageRoom->location->floor}}</td>
                                    <td>{{$networkedstorage->NetworkedStorageRoom->location->building->name}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>    
            </div>
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <H4 class="text-center">รายการเครื่องสำรองไฟฟ้าล่าสุด</H4>
                </div>
                <div class="card-body">
                    <table class="table mt-4 table-hover table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ลำดับที่</th>
                                <th scope="col">รหัส SAP</th>
                                
                                <th scope="col">สถานที่</th>
                                <th scope="col">ชั้น</th>
                                <th scope="col">ตึก</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($upses as $ups)
                                <tr>
                                    <th scope="row">{{ $ups['id'] }}</th>
                                    <td>{{ $ups['sapid'] }}</td>
                                    
                                    <td>{{$ups->UpsRoom->name}}</td>
                                    <td>{{$ups->UpsRoom->location->floor}}</td>
                                    <td>{{$ups->UpsRoom->location->building->name}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>    
            </div>
        </div>
    </div>
@endsection