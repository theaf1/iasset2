@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            <form action="{{ url('/') }}" method="get" role="search" >
                <div class="row mt-4">
                    <div class="col-sm-12 col-lg-6">
                        <div class="form-group">
                            <label for="search_class" class="form-label">ต้องการค้นหา</label>
                            <select name="search_class" id="search_class" class="form-select @error('search_class') is-invalid @enderror">
                                <option value="" hidden></option>
                                @foreach ($searches as $search)
                                    <option value="{{ $search['id'] }}">{{ $search['ui_name'] }}</option>
                                @endforeach
                            </select>
                            @error('search_class')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <div class="form-group">
                            <label for="search_column" class="form-label">สถานที่ตั้งเครื่อง</label>
                            <select class="form-select" name="search_column" id="search_column">
                                <option value="" hidden></option>
                                @foreach($rooms as $room)
                                    <option value="{{$room['id']}}">{{$room['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">    
                    <div class="col-sm-12 col-lg-6">
                        <div class="form-group">
                            <label for="keyword" class="form-label">คำสำคัญที่ใช้ในการค้นหา</label>
                            <input type="text" name="keyword" id="keyword" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <div class="form-group">
                            <label for="per_page" class="form-label">ผลการค้นหาต่อหน้า</label>
                            <select name="per_page" id="per_page" class="form-select">
                                <option value="2">2</option>
                                <option value="10">10</option>
                                <option value="20" selected>20</option>
                                <option value="30">30</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-4 mr-2">
                    <button type="submit" class="btn btn-lg btn-primary">ค้นหาครุภัณฑ์</button>
                    <button type="reset" class="btn btn-lg btn-danger">ยกเลิก</button>
                </div>
            </form>
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
                    <h4 class="text-center">ผลการค้นหา</h4>
                </div>
                <div class="card-body">
                    <table class="table mt-4 table-hover table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">ลำดับที่</th>
                                <th scope="col">SAP</th>
                                <th scope="col">รหัสครุภัณฑ์</th>
                                {{-- <th scope="col"></th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @isset($results)
                                @foreach ($results as $result)
                                    <tr>
                                        <th scope="row">{{ $result['id'] }}</th>
                                        <td>{{ $result['sapid'] }}</td>
                                        <td>{{ $result['pid'] }}</td>
                                        {{-- <td><a href="{{ url('/client/show',$result->id) }}" class="btn btn-sm btn-info" role="button">รายละเอียด</a></td> --}}
                                    </tr>
                                @endforeach
                            @endisset
                        </tbody>
                    </table>
                    @isset($results)
                        {{$results->links()}}
                    @endisset
                </div>
            </div>            
        </div>
    </div>
@endsection