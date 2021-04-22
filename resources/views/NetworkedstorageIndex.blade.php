@extends('layouts.app')
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
                    <h4>บัญชีอุปกรณ์เก็บข้อมูลเครือข่าย</h4>
                </div>
                <div class="card-body">
                <a href="{{ url('/ns') }}" class="btn btn-primary btn-block btn-lg btn-info" role="button">เพิ่มอุปกรณ์เก็บข้อมูลเครือข่าย</a>
                    <table class="table mt-4 table-hover table-responsive">
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
                            @foreach ($networkedstorages as $networkedstorage)
                                <tr>
                                    <th scope="row">{{ $networkedstorage['id'] }}</th>
                                    <td>{{ $networkedstorage->NetworkedStorageType->name }}</td>
                                    <td>{{ $networkedstorage['sapid'] }}</td>
                                    <td>{{ $networkedstorage['pid'] }}</td>
                                    <td>{{ $networkedstorage->NetworkedStorageOwner->name }}</td>
                                    <td>{{ $networkedstorage->NetworkedStorageSection->name }}</td>
                                    <td>{{ $networkedstorage->NetworkedStorageMobility->name }}</td>
                                    <td>{{ $networkedstorage->NetworkedStorageAssetStatus->name }}</td>
                                    <td>{{ $networkedstorage->NetworkedStorageAssetUseStatus->name }}</td>
                                    <td>{{ $networkedstorage['update_date'] }}</td>
                                    <td><a href="{{ url('/networkedstorage/show',$networkedstorage->id) }}" class="btn btn-sm btn-info" role="button">รายละเอียด</a></td>
                                    <td><a href="{{ url('/networkedstorage',$networkedstorage->id) }}" class="btn btn-sm btn-info" role="button">แก้ไข</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $networkedstorages->links() }}
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