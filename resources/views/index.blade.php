@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            <form action="{{ url('/search-query') }}" method="get" role="search" >
                @csrf
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
                            <label for="search_column">ที่มี</label>
                            <select class="form-control @error('search_column') is-invalid @enderror" name="search_column" id="search_column">
                                <option value="" hidden></option>
                                <option value="sapid">รหัส SAP</option>
                                <option value="pid">รหัสครุภัณฑ์</option>
                                <option value="brand">ยี่ห้อ</option>
                                <option value="model">รุ่น</option>
                            </select>
                            @error('search_column')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-row">    
                    <div class="col-sm-12 col-lg-6">
                        <div class="form-group">
                            <label for="keyword">คำสำคัญ</label>
                            <input type="text" name="keyword" id="keyword" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <div class="form-group">
                            <label for="per_page">ผลการค้นหาต่อหน้า</label>
                            <select name="per_page" id="per_page" class="form-control">
                                <option value="10">10</option>
                                <option value="20" selected>20</option>
                                <option value="30">30</option>
                            </select>
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