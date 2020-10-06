@extends('Layouts.app')
@section('content')
    
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <H4 class="text-center">รายการเครื่องคอมพิวเตอร์ล่าสุด</H4>
                </div>
                <div class="card-body">
                    <table class="mt-4 table-hover table-responsive">
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
                            @foreach ($clients as $client)
                                <tr>
                                    <th scope="row">{{ $client['id'] }}</th>
                                    <td>{{ $client['sapid'] }}</td>
                                    <td>{{$client->ClientRoom->name }}</td>
                                    <td>{{$client->ClientRoom->location->floor}}</td>
                                    <td>{{$client->ClientRoom->location->building->name}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection