@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-header card-background text-white">
                <h4>ตั้งรหัสผ่านใหม่</h4>
            </div>
            <div class="card-body">
                <form action="">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <label for="email" class="form-label">email</label>
                                <input class="form-control" type="email" name="email" id="email">
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group">
                                <label for="new_password" class="form-label">New Password</label>
                                <input class="form-control" type="password" name="password" id="new_password">
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group">
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <input class="form-control" type="password" name="confirm_password" id="confirm_password">
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 text-center">
                        <button class="btn btn-primary" type="submit">Reset Password</button>
                        <button class="btn btn-danger" type="reset">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection