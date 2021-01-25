@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            <form action="">
                <div class="card mt-4">
                    <div class="card-header card-background text-white">
                        <h4>รายงาน</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="reports">กรุณาเลือกรายงานที่ต้องการ</label>
                                    <select name="" id="reports" class="form-control">
                                        <option value="1">รายงานจำนวนครุภัณฑ์คอมพิวเตอร์รายหน่วยงาน</option>
                                        <option value="2">รายงานจำนวนครุภัณฑ์คอมพิวเตอร์ที่มีอายุมากกว่าที่กำหนด</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="section">หน่วยงาน</label>
                                    <select name="" id="section" class="form-control">
                                        @foreach ($sections as $section)
                                            <option value="{{$section['id']}}">{{$section['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection