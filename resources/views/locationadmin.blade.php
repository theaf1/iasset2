@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>สถานที่ตั้งเเครื่อง</h4>
                </div>
                <div class="card-body">
                    <a href="{{url('/addlocation')}}" class="btn btn-primary btn-block" role="button">เพิ่มสถานที่</a>
                    <table class="table table-hover table-responsive mt-4">
                        <thead>
                            <tr>
                                <th scope="col">ลำดับที่</th>
                                <th scope="col">ห้อง</th>
                                <th scope="col">ชั้น</th>
                                <th scope="col">ปีก</th>
                                <th scope="col">อาคาร</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rooms as $room)
                                <tr>
                                    <th scope="row">{{$room['id']}}</th>
                                    <td>{{$room['name']}}</td>
                                    <td>{{$room->location->floor}}</td>
                                    <td>{{$room->location->wing}}</td>
                                    <td>{{$room->location->building->name}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$rooms->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection