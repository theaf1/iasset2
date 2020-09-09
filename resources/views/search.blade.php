@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            
            <form action="{{ url('/search-query') }}" method="POST" role="search">
                @csrf
                <div class="form-row">
                    <div class="col-sm-12 col-lg-6">
                        <div class="form-group">
                            <label for="search_sap">ต้องการค้นหา</label>
                            <input type="text" name="search" id="search_sap" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="text-center mt-4 mr-2">
                    <button type="submit" class="btn btn-lg btn-success">Submit</button>
                    <button type="reset" class="btn btn-lg btn-danger">Reset</button>
                </div>
            </form>
        </div>
    </div>
@endsection