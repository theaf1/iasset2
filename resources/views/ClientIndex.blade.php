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
                    <h4>ตารางบัญชีคอมพิวเตอร์</h4>
                </div>
                <div class="card-body">
                <a href="{{ url('/computer') }}"class="btn btn-lg btn-block btn-info" role="button">เพิ่มคอมพิวเตอร์</a>
                    <table class="table mt-4 table-hover table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">ลำดับที่</th>
                                <th scope="col">ชนิด</th>
                                <th scope="col">ที่มา</th>
                                <th scope="col">SAP</th>
                                <th scope="col">รหัสครุภัณฑ์</th>
                                <th scope="col">SAP จอ</th>
                                <th scope="col">รหัสครุภัณฑ์จอภาพ</th>
                                <th scope="col">หน่วยงาน</th>
                                <th scope="col">ระบบงาน</th>
                                <th scope="col">ลักษณะการติดตั้ง</th>
                                <th scope="col">สถานะทางทะเบียนครุภัณฑ์</th>
                                <th scope="col">สถานะการใช้งานครุภัณฑ์</th>
                                <th scope="col">จำนวนผู้ใช้งาน</th>
                                <th scope="col">ผู้ใช้งาน</th>
                                <th scope="col">ตำแหน่งผู้ใช้งาน</th>
                                <th scope="col">แก้ไขล่าสุดเมื่อ</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                                <tr>
                                    <th scope="row">{{ $client['id'] }}</th>
                                    <td>{{ $client->ClientType->name }}</td>
                                    <td>{{ $client->ClientOwner->name }}</td>
                                    <td>{{ $client['sapid'] }}</td>
                                    <td>{{ $client['pid'] }}</td>
                                    <td>
                                        @foreach($client->displays as $display_sapid )
                                            {{ $display_sapid->display_sapid}}
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($client->displays as $display_pid)
                                            {{ $display_pid->display_pid }}
                                        @endforeach
                                    </td>
                                    <td>{{ $client->clientSection->name }}</td>
                                    <td>{{ $client->ClientOpsFunction->name }}</td>
                                    <td>{{ $client->ClientMobility->name }}</td>
                                    <td>{{ $client->ClientAssetStatus->name }}</td>
                                    <td>{{ $client->ClientAssetUseStatus->name }}</td>
                                    <td>{{ $client->ClientMultiUser->name }}</td>
                                    <td>{{ $client['user'] }}</td>
                                    <td>{{ $client->ClientPosition->name }}</td>
                                    <td>{{ $client['updated_at'] }}</td>
                                    <td><a href="{{ url('/client',$client->id) }}" class="btn btn-sm btn-info" role="button">แก้ไข</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $clients->links() }} --}}
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