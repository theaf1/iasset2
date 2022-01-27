@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>แก้ไขคุณสมบัติผู้ใช้งาน</h4>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/users/update',$user->id)}}" method="post">
                        @csrf
                        <div class="row mb-1">
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="name" class="form-label">ชื่อ</label>
                                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name',$user->name)}}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email',$user->email)}}">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="role_id" class="form-label">บทบาท</label>
                                    <select name="role_id" id="role_id" class="form-select">
                                        <option value="" hidden></option>
                                        @foreach ($roles as $role)
                                            <option value="{{$role['id']}}" {{old('role_id',$user->role_id) == $role['id'] ? 'selected' : '' }}>{{$role['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="is_active" class="form-label mt-1">สถานะผู้ใช้งาน</label>
                                    <div class="form-check">
                                        <label for="is_active" class="form-check-label"><input class="form-check-input" type="radio" name="is_active" id="is_active" value="1" {{old('is_active',$user->is_active) == 1 ? 'checked' : ''}}>ใช้งาน</label><br>
                                        <label for="is_active" class="form-check-label"><input class="form-check-input" type="radio" name="is_active" id="is_active" value="0" {{old('is_active',$user->is_active) == 0 ? 'checked' : ''}}>ไม่ใช้งาน</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-lg btn-success">Submit</button>
                            <button type="reset" class="btn btn-lg btn-danger">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection