@extends('Layouts.app')
@section('content')
<div class="container-fluid">
    <form action="{{ url('/networkdevices',$networkdevice->id) }}" method="post">
        <input type="hidden" name="_method" value="PUT">
        <div class="col-12 mx-auto">
            @if ( $message = Session::get('success')) <!--แจ้งผลการบันทึกข้อมูล-->
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ $message }}
                </div>
            @endif
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>ข้อมูลพื้นฐานของครุภัณฑ์</h4>
                </div>
                <div class="card-body">
                    @csrf
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6"> <!--รหัส SAP-->
                            <div class="form-group">
                                <label for="sapid">รหัส SAP</label>
                                <input type="text" class="form-control @error('sapid') is-invalid @enderror" id="sapid" name="sapid" placeholder="กรุณาใส่รหัส SAP" autofocus value="{{ old('sapid',$networkdevice->sapid) }}">
                                @error('sapid')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6"> <!--รหัสครุภัณฑ์-->
                            <div class="form-group">
                                <label for="pid">รหัสครุภัณฑ์</label>
                                <input type="text" class="form-control" id="pid" name="pid" placeholder="กรุณาใส่รหัสครุภัณฑ์" value="{{ old('pid',$networkdevice->pid) }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6"> <!--ห้อง-->
                            <div class="form-group">
                                <label for="room">ห้อง</label>
                                <input type="text" class="form-control @error('location_id') is-invalid @enderror" name="room" value="{{ old('room',$networkdevice->NetworkDeviceRoom->name) }}" id="room_autocomplete"/>
                                @error('location_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6"> <!-- ตึก -->
                            <div class="form-group">
                                <label for="building">ตึก</label>
                                <input type="text" class="form-control" name="building" id="building" disabled/>
                            </div>
                        </div>
                    </div>
                    <input hidden type="number" name="location_id" value="{{ old('location_id',$networkdevice->location_id) }}"><!--ค่า location_id-->    
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6"><!-- ชั้น -->
                            <div class="form-group">
                                    <label for="location">ชั้น</label>
                                    <input type="text" class="form-control" name="location" id="location" disabled/>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6"> <!--การติดตั้ง-->
                            <div class="form-group">
                                <label for="is_mobile">ลักษณะการติดตั้ง</label><br>
                                <div class="form-check form-check-inline">
                                    @foreach ($mobiles as $mobile)
                                        <input class="form-check-input @error('mobility_id') is-invalid @enderror" type="radio" name="mobility_id" id="is_mobile" value="{{ $mobile['id'] }}" {{ old('mobility_id',$networkdevice->mobility_id) == $mobile['id'] && old('mobility_id',$networkdevice->mobility_id) !== null ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_mobile">{{ $mobile['name'] }}</label><br>
                                    @endforeach
                                    @error('mobility_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div><br>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6"> <!--หน่วยงาน-->
                            <div class="form-group">
                            <label for="section">หน่วยงาน</label>
                                <select class="form-control @error('section_id') is-invalid @enderror" name="section_id" id="section">
                                    <option value="" hidden></option>
                                    @foreach($sections as $section)
                                        <option value="{{ $section['id'] }}" {{ old('section_id',$networkdevice->section_id) == $section['id'] ? 'selected' : '' }}>{{ $section['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('section')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6"> <!--เบอร์โทร-->
                            <div class="form-group">
                                <label for="tel_no">หมายเลขโทรศัพท์</label>
                                <input type="text" class="form-control @error('tel_no') is-invalid @enderror" name="tel_no" id="tel_no" value="{{ old('tel_no',$networkdevice->tel_no) }}">
                                @error('tel_no')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6"> <!--ผู้รับผิดชอบ-->
                            <div class="form-group">
                                <label for="response_person">ชื่อผู้รับผิดชอบ</label><br>
                                <input type="text" class="form-control @error('response_person') is-invalid @enderror" id="response_person" name="response_person" value="{{ old('response_person',$networkdevice->response_person) }}">
                                @error('response_person')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6"> <!--เจ้าของเครื่อง-->
                            <div class="form-group">
                                <label for="owner">ที่มา</label><br>
                                <div class="form-check">
                                    @foreach ($owners as $owner)
                                        <input class="form-check-input @error('owner_id') is-invalid @enderror" type="radio" name="owner_id" id="owner" value="{{ $owner['id'] }}" {{ old('owner_id',$networkdevice->owner_id) == $owner['id'] ? 'checked' : '' }}>
                                        <label class="form-check-label" for="owner">{{ $owner['name'] }}</label><br>
                                    @endforeach
                                    @error('owner_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6"> <!--สถานะครุภัณฑ์-->
                            <div class="form-group">
                                <label for="asset_status">สถานะของครุภัณฑ์</label>
                                <select class="form-control @error('asset_status_id') is-invalid @enderror" name="asset_status_id" id="asset_status">
                                    <option value="" hidden></option>
                                    @foreach($asset_statuses as $asset_status)
                                        <option value="{{ $asset_status['id'] }}" {{ old('asset_status_id',$networkdevice->asset_status_id) == $asset_status['id'] ? 'selected' : '' }}>{{ $asset_status['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('asset_status_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6"> <!--สถานะการใช้งาน-->
                            <div class="form-group">
                                <label for="asset_use_status">สถานะการใช้งานของครุภัณฑ์</label>
                                <select class="form-control @error('asset_use_status_id') is-invalid @enderror" name="asset_use_status_id" id="asset_use_status">
                                    <option value="" hidden></option>
                                    @foreach($asset_use_statuses as $asset_use_status)
                                        <option value="{{ $asset_use_status['id'] }}" {{ old('asset_use_status_id',$networkdevice->asset_use_status_id) == $asset_use_status['id'] ? 'selected' : '' }}>{{ $asset_use_status['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('asset_use_status_id')
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
                    <h4>ข้อมูลจำเพาะ</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6"> <!--ชนิด-->
                            <div class="form-group">
                                <label for="device_subtype">ชนิดของอุปกรณ์</label>
                                <select class="form-control @error('device_subtype_id') is-invalid @enderror" name="device_subtype_id" id="device_subtype">
                                    <option value="" hidden></option>
                                    @foreach($netsubtypes as $netsubtype)
                                        <option value="{{ $netsubtype['id'] }}" {{ old('device_subtype_id',$networkdevice->device_subtype_id) == $netsubtype['id'] ? 'selected' : '' }}>{{ $netsubtype['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('device_subtype_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6"> <!--ยี่ห้อ-->
                            <div class="form-group">
                                <label for="brand">ยี่ห้อ</label>
                                <input class="form-control @error('brand') is-invalid @enderror" name="brand" id="brand" type="text" value="{{ old('brand',$networkdevice->brand) }}">
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
                                <input class="form-control @error('model') is-invalid @enderror" name="model" id="model" type="text" value="{{ old('model',$networkdevice->model) }}">
                                @error('model')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6"> <!--serial no.-->
                            <div class="form-group">
                                <label for="serial_no">Serial Number ของเครื่อง</label>
                                <input class="form-control @error('serial_no') is-invalid @enderror" name="serial_no" id="serial_no" type="text" value="{{ old('serial_no',$networkdevice->serial_no) }}">
                                @error('serial_no')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6"> <!--การขยายขนาด-->
                            <div class="form-group">
                                <label for="is_modular">ความสามารถในการขยายขนาด</label>
                                <div class="form-check">
                                    <label class="form-check-label"><input type="checkbox" class="form-check-input" name="is_modular" id="is_modular" value="1" {{ old('is_modular',$networkdevice->is_modular) == 1 ? 'checked' : '' }}><label for="is_modular">ขยายขนาดได้</label></label>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6"> <!--จำนวน port-->
                            <div class="form-group">
                                <label for="port_count">จำนวน port</label>
                                <input type="number" class="form-control" name="port_count" id="port_count" min="0" value="{{ old('port_count',$networkdevice->port_count) }}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6"> <!--power supply-->
                            <div class="form-group">
                                <label for="port_count">จำนวน power supply</label>
                                <input type="number" class="form-control" name="psu_count" id="psu_count" min="1" default="1" value="{{ old('psu_count',$networkdevice->psu_count) }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6"> <!--address ตั้งค่า-->
                            <div class="form-group">
                                <label for="device_management_address">IP address ที่ใช้ตั้งค่า</label>
                                <input class="form-control @error('device_management_address') is-invalid @enderror" type="text" name="device_management_address" id="device_management_address" placeholder="127.0.0.1" value="{{ old('device_management_address',$networkdevice->device_management_address) }}">   
                                @error('device_management_address')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6"> <!--Software version-->
                            <div class="form-group">
                                <label for="software_version">Software Version</label>
                                <input class="form-control" type="text" name="software_version" id="software_version" value="{{ old('software_version',$networkdevice->software_version) }}"> 
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
                        <div class="col-sm-12 col-lg-6"> <!--ปัญหา-->
                            <div class="form-group">
                                <label for="issues">ปัญหาในการใช้งาน</label>
                                <textarea class="form-control" name="issues" id="issues" rows="3">{{ old('issues',$networkdevice->issues) }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6"> <!--หมายเหตุ-->
                            <div class="form-group">
                                <label for="remarks">หมายเหตุ</label><br>
                                <textarea class="form-control" name="remarks" id="remarks" rows="3">{{ old('remarks',$networkdevice->remarks) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-lg btn-success">Submit</button>
            <button type="reset" class="btn btn-lg btn-danger">Reset</button>
        </div>
    </form>
</div>
@endsection

@section('js')<!--script ห้อง-->
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