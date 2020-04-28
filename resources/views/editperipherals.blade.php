@extends('Layouts.app')
@section('content')
<div class="container-fluid">
    <form action="{{ url('/peripheral',$peripheral->id) }}" method="post">
        <input type="hidden" name="_method" value="PUT">
        <div class="col-12 mx-auto">
        @if ( $message = Session::get('success'))<!--script แจ้งผลการบันทึกข้อมูล-->
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ $message }}
            </div>
        @endif
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>ข้อมูลครุภัณฑ์พื้นฐาน</h4>
                </div>
                <div class="card-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6"> <!--ชนิดครุภัณฑ์-->
                            <div class="form-group">
                                <label for="type">ชนิด</label>
                                <select class="form-control @error('type') is-invalid @enderror" id="type" name="type">
                                    <option value="" hidden selected></option>
                                    @foreach($peripheraltypes as $peripheraltype)
                                        <option value="{{ $peripheraltype['id'] }}"{{ old('type',$peripheral->type) == $peripheraltype['id'] ? 'selected' : ''}}>{{ $peripheraltype['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('type')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6"> <!--รหัส SAP-->
                            <div class="form-group">
                                <label for="sapid">รหัส SAP</label>
                                <input type="text" class="form-control" id="sapid" name="sapid" value="{{ old('sapid',$peripheral->sapid) }}" placeholder="กรุณาใส่รหัส SAP">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6"> <!--รหัสครุภัณฑ์-->
                            <div class="form-group">
                                <label for="pid">รหัสครุภัณฑ์</label>
                                <input type="text" class="form-control" id="pid" name="pid" value="{{ old('pid',$peripheral->pid) }}" placeholder="กรุณาใส่รหัสครุภัณฑ์">
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6"><!--ห้อง-->
                            <div class="form-group">
                                <label for="room">ห้อง</label>
                                <input type="text" class="form-control @error('location_id') is-invalid @enderror" name="room" placeholder="กรุณาระบุห้อง" id="room_autocomplete" value="{{ old('room') }}"/>
                                @error('location_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6"> <!--ตึก-->
                            <div class="form-group">
                                <label for="building">ตึก</label>
                                <output type="text" class="form-control" name="building" id="building"/>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6"><!--ชั้น-->
                            <div class="form-group">
                                <label for="location">ชั้น</label>
                                <output type="text" class="form-control" name="location" id="location"/>   
                            </div>
                        </div>
                    <input hidden type="number" value="{{ old('location_id',$peripheral->location_id) }}" name="location_id"><!--ค่า location_id-->
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6"> <!--ลักษณะการติดตั้ง-->
                            <div class="form-group">
                                <label for="is_mobile">ลักษณะการติดตั้ง</label><br>
                                <div class="form-check">
                                    @foreach ($mobiles as $mobile)
                                        <input class="form-check-input @error('is_mobile') is-invalid @enderror" type="radio" name="is_mobile" id="is_mobile" value="{{ $mobile['value'] }}" {{ old('is_mobile',$peripheral->is_mobile) == $mobile['value'] && old('is_mobile') !== null ? 'checked' : ''}}>
                                        <label class="form-check-label" for="is_mobile">{{ $mobile['name'] }}</label><br>
                                    @endforeach
                                    @error('is_mobile')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6"> <!--หน่วยงาน-->
                        <div class="form-group"> 
                            <label for="section">หน่วยงาน</label>
                                <select class="form-control @error('section') is-invalid @enderror" name="section" id="section">
                                    <option value="" hidden></option>
                                    @foreach($sections as $section)
                                        <option value="{{ $section['id'] }}" {{ old('section',$peripheral->section) == $section['id'] ? 'selected' : '' }}>{{ $section['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('section')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6"> <!--ชื่อผู้ใช้งาน-->
                            <div class="form-group">
                                <label for="user">ชื่อผู้ใช้งาน</label><br>
                                <input type="text" class="form-control @error('user') is-invalid @enderror" id="user" name="user" value="{{ old('user',$peripheral->user) }}">
                                @error('user')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6"> <!--ตำแหน่งผู้ใช้งาน-->
                            <div class="form-group">
                                <label for="position">ตำแหน่งผู้ใช้งาน</label>
                                <input type="text" class="form-control" name="position" id="position" value="{{ old('position',$peripheral->position) }}">
                                @error('position')
                                    <div class="invalid-feedback">
                                        {{ $message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6"> <!--หมายเลขโทรศัพท์-->
                            <div class="form-group">
                                <label for="tel_no">หมายเลขโทรศัพท์</label>
                                <input type="text" class="form-control @error('tel_no') is-invalid @enderror" name="tel_no" id="tel_no" value="{{ old('tel_no',$peripheral->tel_no) }}" placeholder="9-9999">
                                @error('tel_no')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6"> <!--เจ้าของเครื่อง-->
                            <div class="form-group">
                                <label for="owner">ที่มา</label>
                                <div class="form-check">
                                    @foreach ($owners as $owner)
                                        <input class="form-check-input @error('owner') is-invalid @enderror" type="radio" name="owner" id="owner" value="{{ $owner['id'] }}" {{ old('owner',$peripheral->owner) == $owner['id'] ? 'checked' : '' }}>
                                        <label class="form-check-label" for="owner">{{ $owner['name'] }}</label><br>   
                                    @endforeach
                                    @error('owner')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6"> <!--สถานะของครุภัณฑ์-->
                            <div class="form-group">
                                <label for="asset_status">สถานะของครุภัณฑ์</label>
                                <select class="form-control @error('asset_status') is-invalid @enderror" name="asset_status" id="asset_status">
                                    <option value="" hidden selected></option>
                                    @foreach($asset_statuses as $asset_status)
                                        <option value="{{ $asset_status['id'] }}" {{ old('asset_status',$peripheral->asset_status) == $asset_status['id'] ? 'selected' : ''}}>{{ $asset_status['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('asset_status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6"> <!--สถานะการใช้งาน-->
                            <div class="form-group">
                                <label for="asset_use_status">สถานะการใช้งานของครุภัณฑ์</label>
                                <select class="form-control @error('asset_use_status') is-invalid @enderror" name="asset_use_status" id="asset_status">
                                    <option value="" hidden selected></option>
                                    @foreach($asset_use_statuses as $asset_use_status)
                                        <option value="{{ $asset_use_status['id'] }}" {{ old('asset_use_status',$peripheral->asset_use_status) == $asset_use_status['id'] ? 'selected' : ''}}>{{ $asset_use_status['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('asset_use_status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>คุณสมบัติของเครื่อง</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6"> <!--ยี่ห้อ-->
                            <div class="form-group">
                                <label for="brand">ยี่ห้อ</label>
                            <input class="form-control @error('brand') is-invalid @enderror" name="brand" id="brand" type="text" value="{{ old('brand',$peripheral->brand) }}">
                                @error('brand')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6"> <!--รุ่น-->
                            <div class="form-group">
                                <label for="model">รุ่น</label>
                                <input class="form-control @error('model') is-invalid @enderror" name="model" id="model" type="text" value="{{ old('model',$peripheral->model) }}">
                                @error('model')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6"> <!--serial number-->
                            <div class="form-group">
                                <label for="serial_no">Serial Number จากผู้ผลิต</label>
                                <input class="form-control @error('serial_no') is-invalid @enderror" name="serial_no" id="serial_no" type="text" value="{{ old('serial_no',$peripheral->serial_no) }}">
                                @error('serial_no')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6"> <!--วัสดุสึกหรอสิ้นเปลือง-->
                            <div class="form-group">
                                <label for="supply_consumables">สามารถเบิกวัสดุสึกหรอสิ้นเปลืองได้</label>
                                <div class="form-check">
                                    @foreach($supplies as $supply)
                                        <input class="form-check-input @error('supply_consumables') is-invalid @enderror" type="radio" name="supply_consumables" id="supply_consumables" value="{{ $supply['id'] }}" {{ old('supply_consumables',$peripheral->supply_consumables) == $supply['id'] ? 'checked' : '' }}>
                                        <label class="form-check-label" for="supply_consumables">{{ $supply['name'] }}</label><br>
                                    @endforeach
                                    @error('supply_consumables')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6"> <!--วิธีการเชื่อมต่อ-->
                            <div class="form-group">
                                <label for="asset_use_status">วิธีการเชื่อมต่อ</label>
                                <select class="form-control @error('connectivity') is-invalid @enderror" name="connectivity" id="connectivity">
                                    <option value="" hidden selected></option>
                                    @foreach ($peripheralconnections as $peripheralconnection)
                                        <option value="{{ $peripheralconnection['id'] }}"{{ old('connectivity',$peripheral->connectivity) == $peripheralconnection['id'] ? 'selected' : ''}}>{{ $peripheralconnection['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('connectivity')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6"> <!--ip address-->
                            <div class="form-group">
                                <label for="ip_address">IP address ของเครื่อง</label>
                                <input type="text" class="form-control @error('ip_address') is-invalid @enderror" id="ip_address" name="ip_address" value="{{ old('ip_address',$peripheral->ip_address) }}">
                                @error('ip_address')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6"> <!--Lan outlet-->
                            <div class="form-group">
                                <label for="share_name">Lan Outlet No.</label>
                                <input type="text" class="form-control" id="lan_outlet_no" name="lan_outlet_no" value="{{ old('lan_outlet_no',$peripheral->lan_outlet_no) }}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6"> <!--share-->
                            <div class="form-group">
                                <label for="is_shared">สถานะการใช้งานร่วมกัน</label><br>
                                <input type="checkbox" name="is_shared" value="1" {{ old('is_shared',$peripheral->is_shared) == 1 ? 'checked' : '' }}>เป็นเครื่องใช้งานร่วมกัน<br>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6"><!--share name-->
                            <div class="form-group">
                                <label for="share_name">Share Name</label>
                                <input type="text" class="form-control @error('share_name') is-invalid @enderror" id="share_name" name="share_name" value="{{ old('share_name',$peripheral->share_name) }}">
                                @error('share_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div> 
                        <div class="col-sm-12 col-lg-6"><!--วิธี share-->
                            <div class="form-group">
                                <label for="share_method">วิธีการ share</label>
                                <div class="form-check">
                                    @foreach ($sharemethods as $sharemethod)
                                        <input type="radio" class="form-check-input @error('share_method') is-invalid @enderror" name="share_method" id="share_method" value="{{ $sharemethod['id'] }}" {{ old('share_method',$peripheral->share_method) == $sharemethod['id'] ? 'checked' : '' }}>
                                        <label for="share_method" class="form-check-label">{{ $sharemethod['name'] }}</label><br>
                                    @endforeach
                                    @error('share_method')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>หมายเหตุและปัญหาในการใช้งาน</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6"> <!--หมายเหตุ-->
                            <div class="form-group">
                                <label for="remarks">หมายเหตุ</label><br>
                            <textarea class="form-control" name="remarks" id="remarks" rows="2" placeholder="หมายเหตุ">{{ old('remarks',$peripheral->remarks) }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6"><!--issues-->
                            <div class="form-group">
                                <label for="issues">ปัญหาในการใช้งาน</label>
                                <textarea class="form-control" name="issues" id="issues" rows="2" placeholder="ปัญหาในการใช้งาน">{{ old('issues',$peripheral->issues)}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-lg btn-success">Submit</button>
        </div>
    </form>
</div>
@endsection

@section('js') <!--script ห้อง-->
<script src="{{ url('/js/jquery.autocomplete.min.js') }}"></script>
<script src="{{ url('/js/axios.min.js') }}"></script>
<script>
    var room = null;
    $("#room_autocomplete").autocomplete({
        paramName: "name",
        serviceUrl: "{{ url('rooms') }}",
        minChars: 1,
        transformResult: function(response) {
            return {
                suggestions: $.map($.parseJSON(response), function(item) {
                    console.log(item.location)
                    return {
                        id: item.id,
                        value: item.name,
                        building: item.location.building.name,
                        location: item.location.floor + ' ' + item.location.wing
                    };
                })
            };
        },
        onSelect: function (suggestion) {
            $("#room_autocomplete").val(suggestion.value);
            $("#building").val(suggestion.building);
            $("#location").val(suggestion.location);
            $("input[name=location_id]").val(suggestion.id);
            room = suggestion.value;
            
        },
    });
    $("#room_autocomplete").change(function() {
        if($(this).val() !== room) {
            $(this).val('');
            $("#building").val('');
            $("#location").val('');
        }
    });

</script>
@endsection