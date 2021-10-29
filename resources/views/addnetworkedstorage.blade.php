@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            <form action="/add-ns" method="post">
                @if ( $message = Session::get('success')) <!--แจ้งผลการบันทึกข้อมูล-->
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ $message }}
                    </div>
                @endif
                <div class="card mt-4">
                    <div class="card-header card-background text-white">
                        <h4>ข้อมูลครุภัณฑ์พี้นฐาน</h4>
                    </div>
                    <div class="card-body">
                        <input type="hidden" id="last_sap" value="{{ $lastinternalsap }}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 col-lg-6"> <!--รหัส SAP-->
                                <div class="form-group">
                                    <label for="sapid" class="form-label">รหัส SAP</label>
                                    <input type="text" class="form-control @error('sapid') is-invalid @enderror" id="sapid" name="sapid" value="{{ old('sapid') }}"><button type="button" class="btn btn-primary mt-3" onclick="generateInternalSAP()">ให้รหัสภายใน</button>
                                    <small id="sapid" class="form-text">กรุณาใส่รหัส SAP 12 หลักหากไม่มีให้กดปุ่ม "ให้รหัสภายใน"</small>
                                    @error('sapid')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6"> <!--รหัสครุภัณฑ์-->
                                <div class="form-group">
                                    <label for="pid" class="form-label">รหัสครุภัณฑ์</label>
                                    <input type="text" class="form-control" id="pid" name="pid" value="{{ old('pid') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6"> <!--ห้อง-->
                                <div class="form-group">
                                    <label for="room" class="form-label">ห้อง</label>
                                    <input type="text" class="form-control @error('location_id') is-invalid @enderror" name="room" id="room_autocomplete" placeholder="กรุณาระบุห้องที่เครื่องตั้งอยู่" value="{{ old('room') }}"/>
                                    @error('location_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror 
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6"> <!-- ตึก -->
                                <div class="form-group">
                                    <label for="building" class="form-label">ตึก</label>
                                    <output type="text" class="form-control" name="building" id="building" disabled/>
                                </div>
                            </div>
                        </div>
                        <input hidden type="number" name="location_id" value="{{ old('location_id') }}"><!--ค่า location_id-->    
                        <div class="row">
                            <div class="col-sm-12 col-lg-6"><!-- ชั้น -->
                                <div class="form-group">
                                    <label for="location" class="form-label">ชั้น</label>
                                    <output type="text" class="form-control" name="location" id="location" disabled/>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6"> <!--การติตตั้ง-->
                                <div class="form-group">
                                    <label for="is_mobile" class="form-label">ลักษณะการติดตั้ง</label><br>
                                    <div class="form-check">
                                        @foreach ($mobiles as $mobile)
                                            <input class="form-check-input @error('mobility_id') is-invalid @enderror" type="radio" name="mobility_id" id="is_mobile" value="{{ $mobile['id'] }}" {{ old('mobility_id') == $mobile['value'] && old('mobility_id') !== null ? 'checked' : '' }}>
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
                        <div class="row">
                            <div class="col-sm-12 col-lg-6"> <!--หน่วยงาน-->
                                <div class="form-group">
                                    <label for="section" class="form-label">หน่วยงาน</label>
                                    <select class="form-select @error('section_id') is-invalid @enderror" name="section_id" id="section">
                                        <option value="" hidden></option>
                                        @foreach($sections as $section)
                                            <option value="{{ $section['id'] }}" {{ old('section_id') == $section['id'] ? 'selected' : '' }}>{{ $section['name'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('section_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6"> <!--เบอร์โทร-->
                                <div class="form-group">
                                    <label for="tel_no" class="form-label">หมายเลขโทรศัพท์</label>
                                    <input type="tel" class="form-control @error('tel_no') is-invalid @enderror" name="tel_no" id="tel_no" placeholder="9-9999" value="{{ old('tel_no') }}">
                                    @error('tel_no')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6"> <!--ผู้รับผิดชอบ-->
                                <div class="form-group">
                                    <label for="response_person" class="form-label">ชื่อผู้รับผิดชอบ</label><br>
                                    <input type="text" class="form-control @error('response_person') is-invalid @enderror" id="response_person" name="response_person" value="{{ old('response_person') }}">
                                    @error('response_person')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6"> <!--เจ้าของเครื่อง-->
                                <div class="form-group">
                                    <label for="owner" class="form-label">ที่มา</label><br>
                                    <div class="form-check">
                                        @foreach ($owners as $owner)
                                            <input class="form-check-input @error('owner_id') is-invalid @enderror" type="radio" name="owner_id" id="owner" value="{{ $owner['id'] }}" {{ old('owner_id') == $owner['id'] ? 'checked' : '' }}>
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
                        <div class="row">
                            <div class="col-sm-12 col-lg-6"> <!--สถานะครุภัณฑ์-->
                                <div class="form-group">
                                    <label for="asset_status" class="form-label">สถานะของครุภัณฑ์</label>
                                    <select class="form-select @error('asset_status_id') is-invalid @enderror" name="asset_status_id" id="asset_status">
                                        <option value="" hidden></option>
                                        @foreach($asset_statuses as $asset_status)
                                            <option value="{{ $asset_status['id'] }}" {{ old('asset_status_id') == $asset_status['id'] ? 'selected' : '' }}>{{ $asset_status['name'] }}</option>
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
                                    <label for="asset_use_status" class="form-label">สถานะการใช้งานของครุภัณฑ์</label>
                                    <select class="form-select @error('asset_use_status_id') is-invalid @enderror" name="asset_use_status_id" id="asset_use_status">
                                        <option value="" hidden></option>
                                        @foreach($asset_use_statuses as $asset_use_status)
                                            <option value="{{ $asset_use_status['id'] }}" {{ old('asset_use_status_id') == $asset_use_status['id'] ? 'selected' : '' }}>{{ $asset_use_status['name'] }}</option>
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
                        <h4>คุณลักษณะของครุภัณฑ์</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-lg-6"> <!--ชนิด-->
                                <div class="form-group">
                                    <label for="type" class="form-label">ชนิดของอุปกรณ์</label> 
                                    <div class="form-check">
                                        @foreach ($storagetypes as $storagetype)
                                            <input class="form-check-input @error('storage_type_id') is-invalid @enderror" type="radio" name="storage_type_id" id="type" value="{{ $storagetype['id'] }}" {{ old('storage_type_id') == $storagetype['id'] ? 'checked' : '' }}>
                                            <label class="form-check-label" for="type">{{ $storagetype['name'] }}</label><br>
                                        @endforeach
                                        @error('type')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                                         
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6"> <!--ยี่ห้อ-->
                                <div class="form-group">
                                    <label for="brand" class="form-label">ยี่ห้อ</label>
                                    <input class="form-control @error('brand') is-invalid @enderror" name="brand" id="brand" type="text" value="{{ old('brand') }}">
                                    @error('brand')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6"> <!--รุ่น-->
                                <div class="form-group">
                                    <label for="model" class="form-label">รุ่น</label>
                                    <input class="form-control  @error('model') is-invalid @enderror" name="model" id="model" type="text" value="{{ old('model') }}">
                                    @error('model')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6"> <!--serial no.-->
                                <div class="form-group">
                                    <label for="serial_no" class="form-label">Serial Number</label>
                                    <input class="form-control @error('serial_no') is-invalid @enderror" name="serial_no" id="serial_no" type="text" value="{{ old('serial_no') }}">
                                    @error('serial_no')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6"> <!--ความจุรวม-->
                                <div class="form-group">
                                    <label for="hdd_total_cap" class="form-label">ความจุข้อมูลรวม</label>
                                        <div class="form-check-inline">
                                            @foreach ($dataunits as $dataunit)
                                                <input type="radio" name="data_unit_id" id="data_unit" value="{{ $dataunit['id']}}" class="form-check-input @error('data_unit_id') is-invalid @enderror pl-2" {{ old('data_unit_id') == $dataunit['id'] ? 'checked' : '' }}>
                                                <label for="data_unit" class="form-check-label pl-1">{{ $dataunit['name'] }}</label>
                                            @endforeach
                                            @error('data_unit_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    <input class="form-control @error('hdd_total_cap') is-invalid @enderror" type="number" name="hdd_total_cap" id="hdd_total_cap" step="0.01" value="{{ old('hdd_total_cap') }}">
                                    @error('hdd_total_cap')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6"> <!--จำนวน HDD สูงสุด-->
                                <div class="form-group">
                                    <label for="no_of_physical_drive_max" class="form-label">จำนวน Hard Disk สูงสุดที่ยอมรับได้</label>
                                    <input type="number" class="form-control @error('no_of_physical_drive_max') is-invalid @enderror" name="no_of_physical_drive_max" id="no_of_physical_drive_max" min="0" value="{{ old('no_of_physical_drive_max') }}">
                                </div>
                                @error('no_of_physical_drive_max')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-12 col-lg-6"> <!--จำนวน HDD-->
                                <div class="form-group">
                                    <label for="no_of_physical_drive_populated" class="form-label">จำนวน Hard Disk ที่มีอยู่</label>
                                    <input type="number" class="form-control @error('no_of_physical_drive_populated') is-invalid @enderror" name="no_of_physical_drive_populated" id="no_of_physical_drive_populated" value="{{ old('no_of_physical_drive_populated') }}">
                                    @error('no_of_physical_drive_populated')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6"> <!--ชื่อเครื่อง-->
                                <div class="form-group">
                                    <label for="device_name" class="form-label">ชื่อเครื่อง</label>
                                    <input type="text" name="device_name" id="device_name" class="form-control @error('device_name') is-invalid @enderror" value="{{ old('device_name') }}">
                                    @error('device_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6"> <!--address ควบคุมเครื่อง-->
                                <div class="form-group">
                                    <label for="device_management_address" class="form-label">IP Address ที่ใช้ควบคุมเครื่อง</label>
                                    <input type="text" name="device_management_address" id="device_management_address" class="form-control @error('device_management_address') is-invalid @enderror" value="{{ old('device_management_address') }}">
                                    @error('device_management_address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>                       
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6"> <!--address รับส่งข้อมูล-->
                                <div class="form-group">
                                    <label for="device_communication_address" class="form-label">Address ที่ใช้รับส่งข้อมูล</label>
                                    <input type="text" name="device_communication_address" id="device_communication_address" class="form-control @error('device_communication_address') is-invalid @enderror" value="{{ old('device_communication_address') }}">
                                    @error('device_communication_address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6"> <!--protocol-->
                                <div class="form-group">
                                    <label for="type" class="form-label">Protocol ที่ใช้รับส่งข้อมูล</label>
                                    <div class="form-check-inline pl-2">
                                        <label class="form-check-label"><input type="checkbox" class="form-check-input" name="is_smb" id="smb" value="1" {{ old('is_smb') == 1 ? 'checked' : '' }}><label for="smb">SMB</label></label>
                                        <label class="form-check-label pl-2"><input type="checkbox" class="form-check-input" name="is_fc" id="fc" value="1" {{ old('is_fc') == 1 ? 'checked' : '' }}><label for="is_fc">Fiber Channel</label></label>
                                        <label class="form-check-label pl-2"><input type="checkbox" class="form-check-input" name="is_iscsi" id="iscsi" value="1" {{ old('is_iscsi') == 1 ? 'checked' : '' }}><label for="iscsi">iSCSI</label></label>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="cardheader card-background text-white">
                        <h4>หมายเหตุและปัญหาในการใช้งาน</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-lg-6"> <!--หมายเหตุ-->
                                <div class="form-group">
                                    <label for="remarks" class="form-label">หมายเหตุ</label><br>
                                    <textarea class="form-control" name="remarks" id="remarks" rows="2">{{ old('remarks') }}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6"> <!--issues-->
                                <div class="form-group">
                                    <label for="issues" class="form-label">ปัญหาในการใช้งาน</label>
                                    <textarea class="form-control" name="issues" id="issues" rows="2">{{ old('issues') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-lg btn-success">บันทึกข้อมูล</button>
                    <button type="reset" class="btn btn-lg btn-danger">ล้างข้อมูล</button>
                </div>
            </form>
        </div>
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
    function generateInternalSAP() {
        var lastsap = document.getElementById("last_sap").value
        if(lastsap == 0)
        {
            document.getElementById("sapid").value = 'MED-001'
            return true
        }
        var splitsap = lastsap.split("-")
        console.log(splitsap)
        
        internalsap = parseInt(splitsap[1])+1
        document.getElementById("sapid").value = 'MED-'+internalsap
    }

</script>
@endsection