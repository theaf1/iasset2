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
                    <h4>บัญชีอุปกรณ์เครือข่าย</h4>
                </div>
                <div class="card-body">
                    <a href="{{ url('/network') }}" class="btn btn-block btn-primary btn-lg btn-info" role="button">เพิ่มอุปกรณ์เครือข่าย</a>
                    <table class="table mt-4 table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">ลำดับที่</th>
                                <th scope="col">ชนิด</th>
                                <th scope="col">SAP</th>
                                <th scope="col">รหัสครุภัณฑ์</th>
                                <th scope="col">ที่มา</th>
                                <th scope="col">หน่วยงาน</th>
                                <th scope="col">mobile</th>
                                <th scope="col">สถานะทางทะเบียนครุภัณฑ์</th>
                                <th scope="col">สถานะการใช้งานครุภัณฑ์</th>
                                <th scope="col">แก้ไขล่าสุดเมื่อ</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($networkdevices as $networkdevice)
                            <tr>
                                <th scope="row">{{ $networkdevice['id'] }}</th>
                                <td>{{ $networkdevice->netsubtype->name }}</td>
                                <td>{{ $networkdevice['sapid'] }}</td>
                                <td>{{ $networkdevice['pid'] }}</td>
                                <td>{{ $networkdevice->NetworkDeviceOwner->name }}</td>
                                <td>{{ $networkdevice->NetworkDeviceSection->name }}</td>
                                <td>{{ $networkdevice->NetworkDeviceMobility->name }}</td>
                                <td>{{ $networkdevice->NetworkDeviceAssetStatus->name }}</td>
                                <td>{{ $networkdevice->NetworkDeviceAssetUseStatus->name }}</td>
                                <td>{{ $networkdevice['update_date'] }}</td>
                                <td><a class="btn btn-sm btn-info" role="button" href="{{ url('/networkdevices/show',$networkdevice->id) }}">รายละเอียด</a></td>
                                <td><a class="btn btn-sm btn-info" role="button" href="{{ url('/networkdevices',$networkdevice->id) }}">แก้ไข</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $networkdevices->links() }}
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