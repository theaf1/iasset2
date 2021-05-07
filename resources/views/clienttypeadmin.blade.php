@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>blah</h4>
                </div>
                <div class="card-body">
                    <a href="{{url('/addclienttype')}}" class="btn btn-block btn-primary" role="button">เพิ่มชนิดของครุภัณฑ์คอมพิวเตอร์</a>
                    <table class="table table-hover table-responsive mt-4">
                        <thead>
                            <tr>
                                <th scope="col">ลำดับที่</th>
                                <th scope="col">ชื่อ</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clienttypes as $clienttype)
                                <tr>
                                    <th scope="row">{{$clienttype['id']}}</th>
                                    <td>{{$clienttype['name']}}</td>
                                    <td><a href="{{url('/clienttype/edit',$clienttype->id)}}" class="btn btn-sm btn-primary" role="button">แก้ไข</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection