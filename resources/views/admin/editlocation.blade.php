@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>แก้ไขสถานที่ตั้ง</h4>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/location/update',$rooms->id)}}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="room_name">ห้อง</label>
                                    <input type="text" name="room" id="room_name" class="form-control" value="{{old('room',$rooms->name)}}">
                                </div> 
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="floor">ชั้น</label>
                                    <input type="number" class="form-control" name="floor" id="floor" min="1" max="30" value="{{old('floor',$rooms->location->floor)}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="wing">ฝั่ง</label>
                                    <input type="text" class="form-control" name="wing_name" id="wing" value="{{old('wing_name',$rooms->location->wing)}}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="building">อาคาร</label>
                                    <select name="building" id="building" class="form-control">
                                        <option value="" hidden></option>
                                        @foreach ($buildings as $building)
                                            <option value="{{$building['id']}}" {{old('building',$rooms->location->building->id) == $building['id'] ? 'selected' : ''}}>{{$building['name']}}</option>
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