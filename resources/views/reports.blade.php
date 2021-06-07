@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            <form action="{{ url('create-report') }}" method="POST">
                @csrf
                <div class="card mt-4">
                    <div class="card-header card-background text-white">
                        <h4>รายงาน</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="reports">กรุณาเลือกรายงานที่ต้องการ</label>
                                    <select name="report_id" id="reports" class="form-control">
                                        @foreach ($reporttypes as $reporttype)
                                            <option value="{{$reporttype['id']}}">{{$reporttype['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="section">หน่วยงาน</label>
                                    <select name="report_section" id="section" class="form-control">
                                        @foreach ($sections as $section)
                                            <option value="{{$section['id']}}">{{$section['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="asset_age">อายุครุภัณฑ์(ปี)</label>
                                    <input type="number" class="form-control" name="asset_age" id="asset_age" value="10" min="1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class= "text-center mt-4 mb-4">
                        <button type="submit" class="btn btn-primary">ออกรายงาน</button>
                        <button type="reset" class="btn btn-danger">ยกเลิก</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection