@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4></h4>
                </div>
                <div class="card-body">
                    <a href="{{url('/admin/adddisplayratio')}}" class="btn btn-primary btn-block mt-4" role="button">aaa</a>
                    <table class="table table-hover table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">ลำดับที่</th>
                                <th scope="col">ชื่อ</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($displayratios as $displayratio)
                                <tr>
                                    <th scope="row">{{$displayratio['id']}}</th>
                                    <td>{{$displayratio['name']}}</td>
                                    <td><a href="#" class="btn btn-sm btn-primary" role="button">แก้ไข</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection