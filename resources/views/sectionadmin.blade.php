@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
        @if ( $message = Session::get('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ $message }}
            </div>
        @endif
        <div class="card mt-4">
            <div class="card-header card-background text-white">
                <h4>รายชื่อหน่วยงาน</h4>
            </div>
            <div class="card-body">
                <a href="{{url('/addsection')}}" class="btn btn-primary btn-block">เพิ่มหน่วยงาน</a>
                <table class="table table-responsive table-hover mt-4">
                    <thead>
                        <tr>
                            <th scope="col">ลำดับที่</th>
                            <th scope="col">ชื่อหน่วยงาน</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sections as $section)
                            <tr>
                                <th scope="row">{{$section['id']}}</th>
                                <td>{{$section['name']}}</td>
                                <td><a href="{{url('/section/edit',$section->id)}}" class="btn btn-primary btn-sm" role="button">แก้ไข</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection