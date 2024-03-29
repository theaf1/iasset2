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
                <form action="{{url('/client')}}" method="get" role="search">
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
                                <th scope="col">ปัญหาในการใช้งาน</th>
                                <th scope="col">หมายเหตุ</th>
                                <th scope="col">แก้ไขล่าสุดเมื่อ</th>
                                <th scope="col"></th>
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
                                    <td>{{ $client['issues'] }}</td>
                                    <td>{{ $client['remarks'] }}</td>
                                    <td>{{ $client['update_date'] }}</td>
                                    <td><a href="{{ url('/client/show',$client->id) }}" class="btn btn-sm btn-info" role="button">รายละเอียด</a></td>
                                    <td><a href="{{ url('/client',$client->id) }}" class="btn btn-sm btn-primary" role="button">แก้ไข</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $clients->links() }}
                </form>
                </div>
            </div>
        </div>
    </div>    
@endsection
@section('js')
    <script>
        @if(Session::has('success'))
            $('#alert').modal('show');
        @endif
    </script>
@endsection