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
                    <h4>บัญชีคอมพิวเตอร์แม่ข่าย</h4>
                </div>
                <div class="card-body">
                    <a href="{{ url('/server') }}" class="btn btn-primary btn-info btn-block btn-lg" role="button">เพิ่มคอมพิวเตอร์แม่ข่าย</a>
                    <table class="table mt-4 table-hover table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">ลำดับที่</th>
                                <th scope="col">SAP</th>
                                <th scope="col">รหัสครุภัณฑ์</th>
                                <th scope="col">หน่วยงาน</th>
                                <th scope="col">ที่มา</th>
                                <th scope="col">mobile</th>
                                <th scope="col">สถานะทางทะเบียนครุภัณฑ์</th>
                                <th scope="col">สถานะการใช้งานครุภัณฑ์</th>
                                <th scope="col">กลุ่มงาน</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($servers as $server)
                                <tr>
                                <th scope="row">{{ $server['id'] }}</th>
                                    <td>{{ $server['sapid'] }}</td>
                                    <td>{{ $server['pid'] }}</td>
                                    <td>{{ $server->ServerSection->name }}</td>
                                    <td>{{ $server->ServerOwner->name }}</td>
                                    <td>{{ $server->ServerMobility->name }}</td>
                                    <td>{{ $server->ServerAssetStatus->name }}</td>
                                    <td>{{ $server->ServerAssetUseStatus->name }}</td>
                                    <td>{{ $server->ServerRoleClass->name }}</td>
                                <td><a href="{{ url('/server',$server->id) }}" class="btn btn-sm btn-info" role="button">แก้ไข</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $servers->links() }}
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