@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            <div class="modal fade" id="alert" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">ข้อความจากระบบ</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            @if(Session::has('success'))
                                {{ Session::get('success') }} 
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">รับทราบ</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>บัญชีรายชื่อระบบงานภายใน</h4>
                </div>
                <div class="card-body">
                    <a href="{{url('/admin/addfunction')}}" class="btn btn-primary btn-block" role="button">เพิ่มระบบงานภายใน</a>
                    <table class="table table-hover table-responsive mt-4">
                        <thead>
                            <tr>
                                <th scope="col">ลำดับที่</th>
                                <th scope="col">ชื่อ</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($functions as $function)
                                <tr>
                                    <th scope="row">{{$function['id']}}</th>
                                    <td>{{$function['name']}}</td>
                                    <td><a href="{{url('/admin/function/edit',$function->id)}}" class="btn btn-primary btn-sm" role="button">แก้ไข</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-center mt-4">
                        <a href="{{url('/admin')}}" class="btn btn-secondary btn-block" role="button">กลับไปเมนูผู้ดูแลระบบ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        @if(Session::has('success'))
            $("#alert").modal("show");
        @endif
    </script>
@endsection