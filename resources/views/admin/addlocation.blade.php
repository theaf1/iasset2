@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>เพิ่มสถานที่ตั้ง</h4>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/add-location')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="room_name" class="form-label">ห้อง</label>
                                    <input type="text" name="room" id="room_name" class="form-control" value="{{old('room')}}">
                                </div> 
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="floor" class="form-label">ชั้น</label>
                                    <input type="number" class="form-control" name="floor" id="floor" min="1" max="30">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="wing" class="form-label">ฝั่ง</label>
                                    <input type="text" class="form-control" name="wing_name" id="wing" value="{{old('wing_name')}}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="building" class="form-label">อาคาร</label>
                                    <select name="building" id="building" class="form-select">
                                        <option value="" hidden></option>
                                        @foreach ($buildings as $building)
                                            <option value="{{$building['id']}}" {{old('building') == $building['id'] ? 'selected' : ''}}>{{$building['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-lg btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection