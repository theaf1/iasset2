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
                    <h4>บัญชีอุปกรณ์ต่อพ่วงเก็บข้อมูล</h4>
                </div>
                <div class="card-body">
                    <a href="{{ url('/storage') }}" class="btn btn-primary btn-block btn-lg btn-info" role="button">เพิ่มอุปกรณ์ต่อพ่วงเก็บข้อมูล</a>
                    <form action="{{url('/storageperipheral')}}" method="get" role="search">
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
                                    <button type="submit" class="btn btn-primary">คัดกรอง</button>
                                </div>
                            </div>
                        </div>
                        <table class="table mt-4 table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col">ลำดับที่</th>
                                    <th scope="col">SAP</th>
                                    <th scope="col">รหัสครุภัณฑ์</th>
                                    <th scope="col">ที่มา</th>
                                    <th scope="col">ความจุข้อมูล</th>
                                    <th scope="col">mobile</th>
                                    <th scope="col">จำนวนผู้ใช้งาน</th> 
                                    <th scope="col">สถานะทางทะเบียนครุภัณฑ์</th>
                                    <th scope="col">สถานะการใช้งานครุภัณฑ์</th>
                                    <th scope="col">แก้ไขล่าสุดเมื่อ</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($storageperipherals)
                                    @foreach ($storageperipherals as $storageperipheral)
                                        <tr>
                                            <th scope="row">{{ $storageperipheral['id'] }}</th>
                                            <td>{{ $storageperipheral['sapid'] }}</td>
                                            <td>{{ $storageperipheral['pid'] }}</td>
                                            <td>{{ $storageperipheral->StorageperipheralOwner->name }}</td>
                                            <td>{{ $storageperipheral['total_capacity'] }} {{$storageperipheral->StoragePeripheralDataUnit->name}}</td>
                                            <td>{{ $storageperipheral->StorageperipheralMobility->name }}</td>
                                            <td>{{ $storageperipheral->StoragePeripheralMultiUser->name }}</td>
                                            <td>{{ $storageperipheral->StoragePeripheralAssetStatus->name }}</td>
                                            <td>{{ $storageperipheral->StoragePeripheralAssetUseStatus->name }}</td>
                                            <td>{{ $storageperipheral['update_date'] }}</td>
                                            <td><a href="{{ url('/storageperipheral/show',$storageperipheral->id) }}" class="btn btn-sm btn-info">รายละเอียด</a></td>
                                            <td><a href="{{ url('/storageperipheral',$storageperipheral->id) }}" class="btn btn-sm btn-info" role="button">แก้ไข</a></td>
                                        </tr>
                                    @endforeach
                                @endisset
                            </tbody>
                        </table>
                        {{-- {{ $storageperipherals->links() }} --}}
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