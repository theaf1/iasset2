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
                    <h4>บัญชีเครื่องสำรองไฟฟ้า</h4>
                </div>
                <div class="card-body">
                <a href="{{ url('/ups') }}" class="btn btn-primary btn-info btn-block btn-lg" role="button">เพิ่มเครื่องสำรองไฟฟ้า</a>
                    <table class="table mt-4 table-hover table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">ลำดับที่</th>
                                <th scope="col">SAP</th>
                                <th scope="col">รหัสครุภัณฑ์</th>
                                <th scope="col">mobile</th>
                                <th scope="col">สถานะทางทะเบียนครุภัณฑ์</th>
                                <th scope="col">สถานะการใช้งานครุภัณฑ์</th>
                                <th scope="col">แก้ไขล่าสุดเมื่อ</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($upses as $ups)
                            <tr>
                                <th scope="row">{{ $ups['id'] }}</th>
                                <td>{{ $ups['sapid'] }}</td>
                                <td>{{ $ups['pid'] }}</td>
                                <td>{{ $ups->UpsMobility->name }}</td>
                                <td>{{ $ups->UpsAssetStatus->name }}</td>
                                <td>{{ $ups->UpsAssetUseStatus->name }}</td>
                                <td>{{ $ups['update_date'] }}</td>
                                <td><a class="btn btn-sm btn-info" role="button" href="{{ url('/ups/show',$ups->id) }}">รายละเอียด</a></td>
                                <td><a class="btn btn-sm btn-info" role="button" href="{{ url('/ups',$ups->id) }}">แก้ไข</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $upses->links() }}
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