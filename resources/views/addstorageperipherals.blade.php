@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            <form action="/add-sp" method="post">
                @if ( $message = Session::get('success'))<!--แจ้งผลการบันทึกข้อมูล-->
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
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6"> <!--รหัส SAP-->
                                <div class="form-group">
                                    <label for="sapid">รหัส SAP</label>
                                    <input type="text" class="form-control  @error('sapid') is-invalid @enderror" id="sapid" name="sapid" value="{{ old('sapid') }}"><button type="button" class="btn btn-primary mt-3" onclick="generateInternalSAP()">ให้รหัสภายใน</button>
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
                            <div class="col-sm-12 col-lg-6"><!--ห้อง-->
                                <div class="form-group">
                                    <label for="room">ห้อง</label>
                                    <input type="text" class="form-control @error('location_id') is-invalid @enderror" name="room" id="room_autocomplete"/ value="{{ old('room') }}">
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
                                    <output type="text" class="form-control" name="building" id="building" />
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
                            <div class="col-sm-12 col-lg-6"> <!--ลักษณะการติดตั้ง-->
                                <div class="form-group">
                                    <label for="is_mobile">ลักษณะการติดตั้ง</label><br>
                                    <div class="form-check form-check-inline">
                                        @foreach ($mobiles as $mobile)
                                            <input class="form-check-input @error('mobility_id') is-invalid @enderror" type="radio" name="mobility_id" id="is_mobile" value="{{ $mobile['id'] }}" {{ old('mobility_id') == $mobile['id'] &&old('mobility_id') !==null ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_mobile">{{ $mobile['name'] }}</label><br>
                                        @endforeach
                                        @error('mobility_id')
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
                                    <select class="form-control @error('section_id') is-invalid @enderror" name="section_id" id="section">
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
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-3">  <!-- จำนวนผู้ใช้งาน -->
                                <div class="form-group">
                                    <label for="multi_user">จำนวนผู้ใช้งาน</label>
                                    <div class="form-check">
                                        @foreach ($multiusers as $multiuser)
                                            <input class="form-check-input @error('multi_user_id') is-invalid @enderror" type="radio" name="multi_user_id" id="multi_user" value="{{ $multiuser['id'] }}" {{ old('multi_user_id') == $multiuser['id'] ? 'checked' : ''}}>
                                            <label class="form-check-label" for="multi_user"> {{ $multiuser['name'] }}</label><br>
                                        @endforeach
                                        @error('multi_user_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-3"> <!--ชื่อผู้ใช้งาน-->
                                <div class="form-group">
                                    <label for="user">ชื่อผู้ใช้งาน</label><br>
                                    <input type="text" class="form-control @error('user') is-invalid @enderror" id="user" name="user" value="{{ old('user') }}">
                                    @error('user')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6"> <!--ตำแหน่งผู้ใช้งาน-->
                                <div class="form-group">
                                    <label for="position">ตำแหน่งผู้ใช้งาน</label>
                                    <select class="form-control @error('position_id') is-invalid @enderror" name="position_id" id="position">
                                        <option value="" hidden></option>
                                        @foreach ($positions as $position)
                                            <option value="{{ $position['id'] }}" {{ old('position_id') == $position['id'] ? 'selected' : ''}}>{{ $position['name'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('position_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6"> <!--หมายเลขโทรศัพท์-->
                                <div class="form-group">
                                    <label for="tel_no">หมายเลขโทรศัพท์</label>
                                    <input type="text" class="form-control @error('tel_no') is-invalid @enderror" name="tel_no" id="tel_no" value="{{ old('tel_no') }}">
                                    @error('tel_no')
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
                                            <input class="form-check-input @error('owner_id') is-invalid @enderror" type="radio" name="owner_id" id="owner" value="{{ $owner['id'] }}" {{ old('owner_id') == $owner['id'] ? 'checked' : ''}}>
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
                            <div class="col-sm-12 col-lg-6"> <!--สถานะของครุภัณฑ์-->
                                <div class="form-group">
                                    <label for="asset_status">สถานะของครุภัณฑ์</label>
                                    <select class="form-control @error('asset_status_id') is-invalid @enderror" name="asset_status_id" id="asset_status">
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
                                    <label for="asset_use_status">สถานะการใช้งานของครุภัณฑ์</label>
                                    <select class="form-control @error('asset_use_status_id') is-invalid @enderror" name="asset_use_status_id" id="asset_use_status">
                                        <option value="" hidden></option>
                                        @foreach($asset_use_statuses as $asset_use_status)
                                            <option value="{{ $asset_use_status['id'] }}" {{ old('asset_use_status_id') == $asset_use_status['id'] ? 'selected' : '' }}>{{ $asset_use_status['name'] }}</option>
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
                        <h4>คุณสมบัติของเครื่อง</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-sm12 col-lg-6"> <!--ยี่ห้อ-->
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
                            <div class="col-sm-12 col-lg-6"> <!--รุ่น-->
                                <div class="form-group">
                                    <label for="model">รุ่น</label>
                                    <input class="form-control @error('model') is-invalid @enderror" name="model" id="model" type="text" value="{{ old('model') }}">
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
                                    <input class="form-control @error('serial_no') is-invalid @enderror" name="serial_no" id="serial_no" type="text" value="{{ old('serial_no') }}">
                                    @error('serial_no')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6"> <!--วิธีการเชื่อมต่อ-->
                                <div class="form-group">
                                    <label for="connectivity">วิธีการเชื่อมต่อ</label>
                                    <select class="form-control @error('connectivity') is-invalid @enderror" name="connectivity" id="connectivity">
                                        <option value="" hidden></option>
                                        @foreach ($connectivities as $connectivity)
                                            <option value="{{ $connectivity['id'] }}" {{ old('connectivity') == $connectivity['id'] ? 'selected' : '' }}>{{ $connectivity['name'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('connectivity')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6"> <!--ความจุข้อมูล-->
                                <div class="form-group">
                                    <label for="total_capacity">ความจุข้อมูล</label>
                                        <div class="form-check-inline pl-1">
                                            @foreach ($dataunits as $dataunit)
                                                <input type="radio" class="form-check-input @error('data_unit_id') is-invalid @enderror" name="data_unit_id" id="dataunit" value="{{ $dataunit['id'] }}" {{ old('data_unit_id') == $dataunit['id'] ? 'checked' : '' }} >
                                                <label for="dataunit" class="form-check-label">{{ $dataunit['name'] }} </label>
                                            @endforeach
                                            @error('data_unit_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    <input class="form-control @error('total_capacity') is-invalid @enderror" name="total_capacity" id="total_capacity" type="number" min="0" step="0.01" value="{{ old('total_capacity') }}">
                                    @error('total_capacity')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6"> <!--เป็นอุปกรณ์ hotswap-->
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="is_hotswap" id="is_hotswap" value="1" {{ old('is_hotswap') == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_hotswap">เป็นอุปกรณ์ hotswap</label><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6"> <!--จำนวน Hard Disk สูงสุดที่ยอมรับได้-->
                                <div class="form-group">
                                    <label for="no_of_physical_drive_max">จำนวน Hard Disk สูงสุดที่ยอมรับได้</label>
                                    <input class="form-control @error('no_of_physical_drive_max') is-invalid @enderror" name="no_of_physical_drive_max" id="no_of_physical_drive_max" type="number" value="{{ old('no_of_physical_drive_max') }}">
                                    @error('no_of_physical_drive_max')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6"> <!--จำนวน Hard Disk ที่มีอยู่-->
                                <div class="form-group">
                                    <label for="no_of_physical_drive_populated">จำนวน Hard Disk ที่มีอยู่</label>
                                    <input class="form-control @error('no_of_physical_drive_populated') is-invalid @enderror" name="no_of_physical_drive_populated" id="no_of_physical_drive_populated" type="number" value="{{ old('no_of_physical_drive_populated') }}">
                                    @error('no_of_physical_drive_populated')
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
                        <h4>หมายเหตุและปัญหาในการใช้งาน</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6"> <!--หมายเหตุ-->
                                <div class="form-group">
                                    <label for="remarks">หมายเหตุ</label><br>
                                    <textarea class="form-control" name="remarks" id="remarks" rows="2">{{ old('remarks') }}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6"> <!--ปัญหาในการใช้งาน-->
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
                    <button type="reset" class="btn btn-lg btn-danger">Reset</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')<!--script ห้อง-->
<script src="{{ url('/js/jquery.autocomplete.min.js') }}"></script>
<script src="{{ url('/js/axios.min.js') }}"></script>
<script>
    let hasDisplay = "<?php echo session()->get('displayCount'); ?>";
    if (hasDisplay > 0) {
        $('#display_count').focus();
    }
    
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

    function displayCountSelected(select) {
        let displayCount = select.options[select.selectedIndex].value;
        document.getElementById("computer_form").action = `{{ url('/add-computer?displayCount=${displayCount}')}}`;
        document.getElementById("computer_form").submit();
    }
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