@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>blah</h4>
                </div>
                <div class="card-body">
                    <a href="#" class="btn btn-block btn-primary" role="button">เพิ่มชนิดของอุปกรณ์ต่อพ่วง</a>
                    <table class="table table-hover table-responsive mt-4">
                        <thead>
                            <tr>
                                <th scope="col">ลำดับที่</th>
                                <th scope="col">ชื่อ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clienttypes as $clienttype)
                                <tr>
                                    <th scope="row">{{$clienttype['id']}}</th>
                                    <td>{{$clienttype['name']}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection