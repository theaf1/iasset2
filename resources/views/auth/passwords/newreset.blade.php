@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-header card-background text-white">
                <h4>ตั้งรหัสผ่านใหม่</h4>
            </div>
            <div class="card-body">
                <form action="{{url('/execute')}}" method="POST">
                    @csrf
                    <div class="row pb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-right">email</label>
                        <div class="col-md-6">
                            <input class="form-control" type="email" name="email" id="email">
                        </div>
                    </div>
                    <div class="row pb-3">
                        <label for="new_password" class="col-md-4 col-form-label text-md-right">New Password</label>
                            <div class="col-md-6">
                                <input class="form-control" type="password" name="password" id="new_password">
                            </div>
                        </div>
                    </div>
                    <div class="row pb-3">
                        <label for="confirm_password" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                        <div class="col-md-6">
                            <input class="form-control" type="password" name="confirm_password" id="confirm_password">
                        </div>
                    </div>
                    <div class="mt-4 text-md-center">
                        <button class="btn btn-primary" type="submit">Reset Password</button>
                        <button class="btn btn-danger" type="reset">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection