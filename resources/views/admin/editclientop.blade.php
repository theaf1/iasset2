@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4></h4>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/clientop/update',$clientos->id)}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="name" class="form-label">ชื่อระบบปฏิบัติการ</label>
                                    <input type="text" name="name" id="name" value="{{ old('name',$clientos->name) }}" class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
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