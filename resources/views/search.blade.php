@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            <form action="post">
                <div class="form-row">
                    <div class="col-sm-12 col-lg-6">
                        <div class="form-group">
                            <label for="search_class">ต้องการค้นหา</label>
                            <select name="a" id="search_class" class="form-control">
                                <option value="" hidden></option>
                                <option value="1">เครื่องคอมพิวเตอร์</option>
                                <option value="2">อุปกรณ์ต่อพ่วง</option>
                                <option value="3">อุปกรณ์ต่อพ่วงเก็บข้อมูล</option>
                                <option value="4">อุปกรณ์เครือข่าย</option>
                                <option value="5">เครื่องคอมพิวเตอร์แม่ข่าย</option>
                                <option value="6">อุปกรณ์เก็บข้อมูลเครือข่าย</option>
                                <option value="7">เครื่องสำรองไฟฟ้า</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <div class="form-group">
                            <label for="">ด้วย</label>
                            <select name="" id="" class="form-control">
                                <option value="" hidden></option>
                                <option value="1">รหัส SAP</option>
                                <option value="2">รหัสครุภัณฑ์</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection