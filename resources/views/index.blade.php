@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            <form action="{{ url('/search-query') }}" method="POST" role="search">
                @csrf
                <div class="card mt-4">
                    <div class="card-header card-background text-white">
                        <h3>tesr</h3>
                    </div>
                    <div class="card-body">    
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="search_class">ต้องการค้นหา</label>
                                    <select name="search_class" id="search_class" class="form-control @error('search_class') is-invalid @enderror">
                                        <option value="" hidden></option>
                                        @foreach ($searches as $search)
                                            <option value="{{ $search['id'] }}">{{ $search['ui_name'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('search_class')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="search_sap">คำสำคัญ</label>
                                    <input type="text" name="search" id="search_sap" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-4 mr-2">
                            <button type="submit" class="btn btn-lg btn-success">Submit</button>
                            <button type="reset" class="btn btn-lg btn-danger">Reset</button>
                            <P>xxx</P>
                        </div>
                    </div>
                </div>        
            </form>
        </div>
    </div>
@endsection