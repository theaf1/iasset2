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
                    <h4>บัญชีจอภาพที่ไม่ได้ใช้กับคอมพิวเตอร์</h4>
                </div>
                <div class="card-body">
                    <a href="{{url('/addloosedisplay')}}" class="btn btn-primary btn-block" role="button">เพิ่มจอภาพที่ไม่ได้ใช้กับคอมพิวเตอร์</a>
                    <form action="{{url('/loosedisplay')}}" method="get" role="search">
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
                                    <button class="btn btn-primary btn-block" type="submit">ค้นหา</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <table class="table table-hover table-responsive mt-4">
                        <thead>
                            <tr>
                                <th scope="col">ลำดับที่</th>
                                <th scope="col">รหัส SAP</th>
                                <th scope="col">รหัสครุภัณฑ์</th>
                                <th scope="col">สถานที่ตั้ง</th>
                                <th scope="col">ที่มา</th>
                                <th scope="col">ผู้รับผิดชอบ</th>
                                <th scope="col">ขนาดจอภาพ (นิ้ว)</th>
                                <th scope="col">สัดส่วนจอภาพ</th>
                                <th scope="col">สถานะการใช้งาน</th>
                                <th scope="col">แก้ไขข้อมูลล่าสุดเมื่อ</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($loosedisplays)
                                @foreach ($loosedisplays as $loosedisplay)
                                    <tr>
                                        <th scope="row">{{$loosedisplay['id']}}</th>
                                        <td>{{$loosedisplay['display_sapid']}}</td>
                                        <td>{{$loosedisplay['display_pid']}}</td>
                                        <td>{{$loosedisplay->LooseDisplayRoom->name}}</td>
                                        <td>{{$loosedisplay->LooseDisplayOwner->name}}</td>
                                        <td>{{$loosedisplay['response_person']}}</td>
                                        <td>{{$loosedisplay['display_size']}}</td>
                                        <td>{{$loosedisplay->LooseDisplayRatio->name}}</td>
                                        <td>{{$loosedisplay->LooseDisplayAssetUseStatus->name}}</td>
                                        <td>{{$loosedisplay['update_date']}}</td>
                                        <td><a href="{{url('/loosedisplay/show',$loosedisplay->id)}}" class="btn btn-info" role="button">รายละเอียด</a></td>
                                        <td><a href="{{url('/loosedisplay/edit',$loosedisplay->id)}}" class="btn btn-primary" role="button">แก้ไข</a></td>
                                    </tr>
                                @endforeach
                            @endisset
                        </tbody>
                    </table>
                    {{$loosedisplays->links()}}
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