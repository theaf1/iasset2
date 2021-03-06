@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-hedader card-background text-white">
                <h4>เพิ่มชนิดอุปกรณ์เครือข่าย</h4>
            </div>
            <div class="card-body">
                <form action="{{url('/admin/netsubtype/update',$netsubtype->id)}}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <label for="name">ชื่อชนิดอุปกรณ์เครือข่าย</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name',$netsubtype->name)}}">
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
@endsection