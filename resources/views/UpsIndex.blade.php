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
                    <div class="d-grid gap-2">
                        <a href="{{ url('/ups') }}" class="btn btn-primary" role="button">เพิ่มเครื่องสำรองไฟฟ้า</a>
                    </div>
                    <form action="{{url('/upses')}}" method="get" role="search">
                        <div class="row">
                            <div class="col-sm-12 col-lg-6 mt-4">
                                <div class="form-group">
                                    <label for="section_filter" class="form-label">หน่วยงานเจ้าของเครื่อง</label>
                                    <select name="section_filter" id="section_filter" class="form-select"> 
                                        <option value="">กรุณาเลือกหน่วยงาน</option>
                                        @foreach($sections as $section)
                                            <option value="{{ $section['id'] }}">{{ $section['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3 mt-4">
                                <div class="form-group">
                                    <label for="per_page" class="form-label">จำนวนบรรทัด</label>
                                    <select class="form-select" name="per_page" id="per_page">
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3 pt-5">
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">ค้นหา</button>
                                </div>
                            </div>
                        </div>
                        <table class="table mt-4 table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col">ลำดับที่</th>
                                    <th scope="col">SAP</th>
                                    <th scope="col">รหัสครุภัณฑ์</th>
                                    <th scope="col">กำลังไฟฟ้า (KVA)</th>
                                    <th scope="col">mobile</th>
                                    <th scope="col">สถานะทางทะเบียนครุภัณฑ์</th>
                                    <th scope="col">สถานะการใช้งานครุภัณฑ์</th>
                                    <th scope="col">แก้ไขล่าสุดเมื่อ</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($upses)
                                    @foreach ($upses as $ups)
                                        <tr>
                                            <th scope="row">{{ $ups['id'] }}</th>
                                            <td>{{ $ups['sapid'] }}</td>
                                            <td>{{ $ups['pid'] }}</td>
                                            <td>{{$ups['capacity']}}</td>
                                            <td>{{ $ups->UpsMobility->name }}</td>
                                            <td>{{ $ups->UpsAssetStatus->name }}</td>
                                            <td>{{ $ups->UpsAssetUseStatus->name }}</td>
                                            <td>{{ $ups['update_date'] }}</td>
                                            <td><a class="btn btn-sm btn-info" role="button" href="{{ url('/ups/show',$ups->id) }}">รายละเอียด</a></td>
                                            <td><a class="btn btn-sm btn-info" role="button" href="{{ url('/ups',$ups->id) }}">แก้ไข</a></td>
                                        </tr>
                                    @endforeach
                                @endisset
                            </tbody>
                        </table>
                        {{ $upses->links() }}
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