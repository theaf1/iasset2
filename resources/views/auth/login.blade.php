@extends('Layouts.auth')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>เข้าสู่ระบบ</h4>
                </div>
                <div class="card-body">
                    <form action="#" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="username">ชื่อผู้ใช้งาน</label>
                                    <input type="text" name="username" id="username" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="password">รหัสผ่าน</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="text-center">
                        <button class="btn btn-lg btn-success">เข้าสู่ระบบ</button>
                        <button class="btn btn-lg btn-danger">ยกเลิก</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection