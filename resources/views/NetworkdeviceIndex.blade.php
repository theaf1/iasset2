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
                    <a href="{{ url('/network') }}" class="btn btn-primary btn-lg" role="button">เพิ่มอุปกรณ์เครือข่าย</a>
                    <form action="{{url('/networkdevices')}}" method="get" role="search">
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6 mt-4">
                                <div class="form-group">
                                    <label for="section_filter">หน่วยงานเจ้าของเครื่อง</label>
                                    <select name="section_filter" id="section_filter" class="form-control"> 
                                        <option value="">กรุณาเลือกหน่วยงาน</option>
                                        @foreach($sections as $section)
                                            <option value="{{ $section['id'] }}">{{ $section['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3 mt-4">
                                <div class="form-group">
                                    <label for="per_page">จำนวนบรรทัด</label>
                                    <select class="form-control" name="per_page" id="per_page">
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3 mt-5">
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">ค้นหา</button>
                                </div>
                            </div>
                        </div>
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
                        {{$networkdevices->links()}}
                    </form>
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