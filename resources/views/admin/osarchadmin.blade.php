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
                    <h4>รายชื่อโครงสรางภายใน software</h4>
                </div>
                <div class="card-body">
                    <a href="{{url('/admin/addosarch')}}" class="btn btn-primary mt-4" role="button">เพิ่มชื่อโครงสรางภายใน software</a>
                    <table class="table table-hover table-responsive mt-4">
                        <thead>
                            <tr>
                                <th scope="col">ลำดับที่</th>
                                <th scope="col">ชื่อโครงสร้างภายใน</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($os_arches as $os_arch)
                                <tr>
                                    <th scope="row">{{$os_arch['id']}}</th>
                                    <td>{{$os_arch['name']}}</td>
                                    <td><a href="{{url('/admin/osarch/edit',$os_arch->id)}}" class="btn btn-primary btn-sm" role="button">แก้ไข</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-center mt-4">
                        <a href="{{url('/admin')}}" class="btn btn-secondary" role="button">กลับไปเมนูผู้ดูแลระบบ</a>
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