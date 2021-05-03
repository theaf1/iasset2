@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>เพิ่มสถานที่ตั้ง</h4>
                </div>
                <div class="card-body">
                    <form action="/x" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="room_name">ห้อง</label>
                                    <input type="text" name="room" id="room_name" class="form-control">
                                </div> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection