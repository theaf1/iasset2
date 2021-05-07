@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>บัญชีชนิดอุปกรณ์ต่อพ่วง</h4>
                </div>
                <div class="card-body">
                    <a href="{{url('/addperipheraltype')}}" class="btn btn-block btn-primary" role="button">เพิ่มชนิดอุปกรณ์ต่อพ่วง</a>
                    <table class="table table-hover table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">ลำดับที่</th>
                                <th scope="col">ชื่อ</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peripheraltypes as $peripheraltype)
                                <tr>
                                    <th scope="row">{{$peripheraltype['id']}}</th>
                                    <td>{{$peripheraltype['name']}}</td>
                                    <td><a href="{{url('/peripheraltype/edit',$peripheraltype->id)}}" class="btn btn-sm btn-primary" role="button">แก้ไข</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection