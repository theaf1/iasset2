@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>แก้ไขชื่อหน่วยงาน</h4>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/section/update',$section->id)}}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="section_name">ชื่อหน่วยงาน</label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="section_name" value="{{ old('name',$section->name) }}">
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