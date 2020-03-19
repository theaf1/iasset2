@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            <form action="/add-ns" method="post">
                <div class="card mt-4">
                    <div class="card-header card-background text-white">
                        <h4>ข้อมูลครุภัณฑ์พี้นฐาน</h4>
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6"> <!--รหัส SAP-->
                                <div class="form-group">
                                    <label for="sapid">รหัส SAP</label>
                                    <input type="text" class="form-control @error('sapid') is-invalid @enderror" id="sapid" name="sapid" value="{{ old('sapid') }}">
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
                                    <input type="text" class="form-control" id="pid" name="pid" value="{{ old('pid') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="room">ห้อง</label>
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
                                    <label for="building">ตึก</label>
                                    <output type="text" class="form-control" name="building" id="building" disabled/>
                                </div>
                            </div>
                        </div>
                        <input hidden type="number" name="location_id" value="{{ old('location_id') }}"><!--ค่า location_id-->    
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6"><!-- ชั้น -->
                                <div class="form-group">
                                    <label for="location">ชั้น</label>
                                    <output type="text" class="form-control" name="location" id="location" disabled/>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="is_mobile">ลักษณะการติดตั้ง</label><br>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="is_mobile" id="is_mobile" value="1">
                                        <label class="form-check-label" for="is_mobile">เป็นเครื่องเคลื่อนที่</label><br>
                                        <input class="form-check-input" type="radio" name="is_mobile" id="is_mobile" value="0" checked>
                                        <label class="form-check-label" for="is_mobile">เป็นเครื่องประจำที่</label><br>
                                    </div><br>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="section">หน่วยงาน</label>
                                    <select class="form-control @error('section') is-invalid @enderror" name="section" id="section">
                                        <option value="" hidden></option>
                                        @foreach($sections as $section)
                                            <option value="{{ $section['id'] }}">{{ $section['name'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('section')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="tel_no">หมายเลขโทรศัพท์</label>
                                    <input type="tel" class="form-control" name="tel_no" id="tel_no" placeholder="9-9999" value="{{ old('tel_no') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="response_person">ชื่อผู้รับผิดชอบ</label><br>
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
                                    <label for="owner">เจ้าของเครื่อง</label><br>
                                    <div class="form-check">
                                        @foreach ($owners as $owner)
                                            <input class="form-check-input @error('owner') is-invalid @enderror" type="radio" name="owner" id="owner" value="{{ $owner['id'] }}">
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
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="asset_status">สถานะของครุภัณฑ์</label>
                                    <select class="form-control @error('asset_status') is-invalid @enderror" name="asset_status" id="asset_status">
                                        <option value="" hidden></option>
                                        @foreach($asset_statuses as $asset_status)
                                            <option value="{{ $asset_status['id'] }}">{{ $asset_status['name'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('asset_status')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="asset_use_status">สถานะการใช้งานของครุภัณฑ์</label>
                                    <select class="form-control @error('asset_use_status') is-invalid @enderror" name="asset_use_status" id="asset_use_status">
                                        <option value="" hidden></option>
                                        @foreach($asset_use_statuses as $asset_use_status)
                                            <option value="{{ $asset_use_status['id'] }}">{{ $asset_use_status['name'] }}</option>
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
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="type">ชนิดของอุปกรณ์</label>
                                    <div class="form-check">
                                        <input class="form-check-input @error('type') is-invalid @enderror" type="radio" name="type" id="type" value="1">
                                        <label class="form-check-label" for="type">NAS</label><br>
                                    </div>     
                                    <div class="form-check">
                                        <input class="form-check-input @error('type') is-invalid @enderror" type="radio" name="type" id="type" value="2">
                                        <label class="form-check-label" for="type">SAN</label><br>
                                    </div>
                                    @error('type')
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
                                    <label for="model">รุ่น</label>
                                    <input class="form-control  @error('model') is-invalid @enderror" name="model" id="model" type="text" value="{{ old('model') }}">
                                    @error('model')
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
                                    <label for="serial_no">Serial Number</label>
                                    <input class="form-control @error('serial_no') is-invalid @enderror" name="serial_no" id="serial_no" type="text" value="{{ old('serial_no') }}">
                                    @error('serial_no')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="hdd_total_cap">ความจุข้อมูลรวม</label>
                                    @foreach ($dataunits as $dataunit)
                                        <div class="form-check-inline pl-1">
                                            <input type="radio" name="data_unit" id="data_unit" value="{{ $dataunit['id']}}" class="form-check-input">
                                            <label for="data_unit" class="form-check-label">{{ $dataunit['name'] }}</label>
                                        </div>
                                    @endforeach
                                    <input class="form-control @error('hdd_total_cap') is-invalid @enderror" type="number" name="hdd_total_cap" id="hdd_total_cap" value="{{ old('hdd_total_cap') }}">
                                    @error('hdd_total_cap')
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
                                    <label for="no_of_physical_drive_max">จำนวน Hard Disk สูงสุดที่ยอมรับได้</label>
                                    <input type="number" class="form-control @error('no_of_physical_drive_max') is-invalid @enderror" name="no_of_physical_drive_max" id="no_of_physical_drive_max" min="0" value="{{ old('no_of_physical_drive_max') }}">
                                </div>
                                @error('no_of_physical_drive_max')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="no_of_physical_drive_populated">จำนวน Hard Disk ที่มีอยู่</label>
                                    <input type="number" class="form-control @error('no_of_physical_drive_populated') is-invalid @enderror" name="no_of_physical_drive_populated" id="no_of_physical_drive_populated" value="{{ old('no_of_physical_drive_populated') }}">
                                    @error('no_of_physical_drive_populated')
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
                                    <label for="lun_count">จำนวน disk จำลองที่มีอยู่</label>
                                    <input type="number" name="lun_count" id="lun_count" class="form-control @error('lun_count') is-invalid @enderror" value="{{ old('lun_count') }}">
                                    @error('lun_count')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="device_name">ชื่อเครื่อง</label>
                                    <input type="text" name="device_name" id="device_name" class="form-control" value="{{ old('device_name') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="device_management_address">IP Address ที่ใช้ควบคุมเครื่อง</label>
                                    <input type="text" name="device_management_address" id="device_management_address" class="form-control" value="{{ old('device_management_address') }}">
                                </div>                       
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="device_communication_address">Address ที่ใช้รับส่งข้อมูล</label>
                                    <input type="text" name="device_communication_address" id="device_communication_address" class="form-control" value="{{ old('device_communication_address') }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="type">Protocol ที่ใช้รับส่งข้อมูล</label>
                                    <div class="form-check form-check-inline pl-2">
                                        <label class="form-check-label"><input type="checkbox" class="form-check-input" name="device_communication_protocol" id="device_communication_protocol" value="1"><label for="device_communication_protocol">SMB</label></label>
                                        <label class="form-check-label pl-2"><input type="checkbox" class="form-check-input" name="device_communication_protocol" id="device_communication_protocol" value="2"><label for="device_communication_protocol">Fiber Channel</label></label>
                                        <label class="form-check-label pl-2"><input type="checkbox" class="form-check-input" name="device_communication_protocol" id="device_communication_protocol" value="3"><label for="device_communication_protocol">iSCSI</label></label>
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
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="remarks">หมายเหตุ</label><br>
                                    <textarea class="form-control" name="remarks" id="remarks" rows="2">{{ old('remarks') }}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6"> <!--issues-->
                                <div class="form-group">
                                    <label for="issues">ปัญหาในการใช้งาน</label>
                                    <textarea class="form-control" name="issues" id="issues" rows="2">{{ old('issues') }}</textarea>
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
    </div>
@endsection

@section('js')
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