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
                    <h4>รายการประเภทเครือข่าย</h4>
                </div>
                <div class="card-body">
                    <a href="{{url('/admin/addnetworkconnection')}}" class="btn btn-block btn-primary mt-4">เพิ่มประเภทเครือข่าย</a>
                    <table class="table table-hover table-responsive mt-4">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">ลำดับที่</th>
                                <th scope="col" class="text-center">ชื่อ</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($networkconnections as $networkconnection)
                                <tr>
                                    <th scope="row" class="text-center">{{$networkconnection['id']}}</th>
                                    <td class="text-center">{{$networkconnection['name']}}</td>
                                    <td><a href="{{url('/admin/networkconnection/edit',$networkconnection->id)}}" class="btn btn-sm btn-primary">แก้ไข</a></td>
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