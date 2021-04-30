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
                <table class="table table-responsive table-hover">
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
                                <td><a href="#" class="btn btn-primary btn-sm" role="button">แก้ไข</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-header card-background text-white">
                <h4>เพิ่มหน่วยงาน</h4>
            </div>
            <div class="card-body">
                <form action="/store" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <label for="section_name">ชื่อหน่วยงาน</label>
                                <input class="form-control" type="text" name="name" id="section_name">
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-lg btn-success">Submit</button>
                        <button type="reset" class="btn btn-lg btn-danger">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection