@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            <form action="/add-ups" method="post">
            @if ( $message = Session::get('success'))
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
                                <input type="text" class="form-control @error('sapid') is-invalid @enderror" id="sapid" name="sapid" placeholder="กรุณาใส่รหัส SAP" value="{{ old('sapid') }}" autofocus><button type="button" class="btn btn-primary mt-3" onclick="generateInternalSAP()">ให้รหัสภายใน</button>
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
                                <input type="text" class="form-control" id="pid" name="pid" placeholder="กรุณาใส่รหัสครุภัณฑ์" value="{{ old('pid') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group"><!--ห้อง-->
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
                        <div class="col-sm-12 col-lg-6"> <!--ลักษณะการติดตั้ง-->
                            <div class="form-group">
                                <label for="is_mobile" class="form-label">ลักษณะการติดตั้ง</label><br>
                                <div class="form-check form-check-inline">
                                    @foreach ($mobiles as $mobile)
                                        <input class="form-check-input @error('mobility_id') is-invalid @enderror" type="radio" name="mobility_id" id="is_mobile" value="{{ $mobile['id'] }}" {{ old('mobility_id') == $mobile['id'] && old('mobility_id') !== null ? 'checked' : '' }}>
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
                        <div class="col-sm-12 col-lg-6"> <!--หน่วยงาน-->
                            <div class="form-group">
                                <label for="section" class="form-label">หน่วยงาน</label>
                                <select class="form-select @error('section_id') is-invalid @enderror" id="section" name="section_id">
                                    <option value="" hidden selected>กรุณาเลือก</option>
                                    @foreach($sections as $section)
                                        <option value="{{ $section['id'] }} {{ old('section_id') == $section['id']  ? 'selected' : ''}}">{{ $section['name'] }}</option>
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
                    <div class="row">
                        <div class="col-sm-12 col-lg-6"> <!--หมายเลขโทรศัพท์-->
                            <div class="form-group">
                                <label for="tel_no" class="form-label">หมายเลขโทรศัพท์</label>
                                <input type="tel" class="form-control @error('tel_no') is-invalid @enderror" name="tel_no" id="tel_no" placeholder="9-7043#107" value="{{ old('tel_no')}}">
                                <small id="tel_no" class="form-text">กรุณาระบุหมายเลขโทรศัพท์ภายในและหมายเลขต่อในรูปแบบ *-****#***</small>
                                @error('tel_no')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6"> <!--เจ้าของเครื่อง-->
                            <div class="form-group">
                                <label for="owner" class="form-label">เจ้าของเครื่อง</label><br>
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
                        <div class="col-sm-12 col-lg-6"> <!--สถานะของครุภัณฑ์-->
                            <div class="form-group">
                                <label for="asset_status" class="form-label">สถานะของครุภัณฑ์</label>
                                <select class="form-select @error('asset_status_id') is-invalid @enderror" name="asset_status_id" id="asset_status">
                                    <option value="" hidden>กรุณาเลือก</option>
                                    @foreach($asset_statuses as $asset_status)
                                        <option value="{{ $asset_status['id'] }}" {{ old('asset_status_id') == $asset_status['id']  ? 'selected' : ''}}>{{ $asset_status['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('asset_status_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6"><!--สถานะการใช้งานของครุภัณฑ์-->
                            <div class="form-group">
                                <label for="asset_use_status" class="form-label">สถานะการใช้งานของครุภัณฑ์</label>
                                <select class="form-select @error('asset_use_status_id') is-invalid @enderror"name="asset_use_status_id" id="asset_use_status">
                                    <option value="" hidden>กรุณาเลือก</option>
                                    @foreach($asset_use_statuses as $asset_use_status)
                                        <option value="{{ $asset_use_status['id'] }}" {{ old('asset_use_status_id') == $asset_use_status['id']  ? 'selected' : ''}}>{{ $asset_use_status['name'] }}</option>
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
                    <h4>คุณสมบัติเฉพาะ</h4>
                </div>
                <div class="card-body">
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
                        <div class="col-sm-12 col-lg-6"> <!--รุ่น-->
                            <div class="form-group">
                                <label for="model" class="form-label">รุ่น</label>
                                <input class="form-control @error('model') is-invalid @enderror" name="model" id="model" type="text" value="{{ old('model') }}">
                                @error('model')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-lg-6"><!--Serial Number จากผู้ผลิต-->
                            <div class="form-group">
                                <label for="serial_no" class="form-label">Serial Number จากผู้ผลิต</label>
                                <input class="form-control @error('serial_no') is-invalid @enderror" name="serial_no" id="serial_no" type="text" value="{{ old('serial_no') }}">
                                @error('serial_no')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6"><!--ลักษณะของตัวเครื่อง-->
                            <div class="form-group">
                            <label for="form_factor" class="form-label">ลักษณะของตัวเครื่อง</label>
                                <div class="form-check">
                                    @foreach ($forms as $form)
                                    <input class="form-check-input" type="radio" name="form_factor_id" id="form_factor" value="{{ $form['id'] }}" {{ old('form_factor_id') == $form['id'] ? 'checked' : '' }}>
                                    <label class="form-check-label" for="form_factor">{{ $form['name'] }}</label><br>
                                    @endforeach
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-lg-6"><!--หลักการทำงาน-->
                            <div class="form-group">
                                <label for="topology" class="form-label">หลักการทำงาน</label>
                                <select class="form-control @error('topology_id') is-invalid @enderror" name="topology_id" id="topology">
                                    <option value="" hidden>กรุณาเลือก</option>
                                    @foreach ($topos as $topo)
                                        <option value="{{ $topo['id'] }}" {{ old('topology_id') == $topo['id'] ? 'selected' : '' }}>{{ $topo['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('topology_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6"><!--กำลังไฟรองรับได้สูงสุด(KVA)-->
                            <div class="form-group">
                                <label for="capacity" class="form-label">กำลังไฟรองรับได้สูงสุด(KVA)</label>
                                <input class="form-control @error('capacity') is-invalid @enderror" type="number" name="capacity" id="capacity" value="{{ old('capacity') }}" step="0.001">
                                @error('capacity')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 col-lg-3">
                            <div class="form-group">
                            <label for="is_modular" class="form-label">ความสามารถในการเปลี่ยนกำลังไฟสูงสุด</label><br>
                                <div class="form-check">
                                    @foreach ($modulars as $modular)
                                        <input class="form-check-input" type="radio" name="is_modular" id="is_modular" value="{{ $modular['value'] }}" {{ old('is_modular') == $modular['value'] ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_modular">{{ $modular['name']}}</label><br>
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-lg-3">
                            <div class="form-group">
                                <label for="battery_type" class="form-label">ชนิดของแบตเตอรี่</label>
                                <div class="form-check">
                                    @foreach($bat_types as $bat_type)
                                        <input class="form-check-input" type="radio" name="battery_type_id" id="battery_type" value="{{ $bat_type['id'] }}" {{ old('battery_type_id') == $bat_type['id'] ? 'checked' : '' }}>
                                        <label class="form-check-label" for="battery_type">{{ $bat_type['name'] }}</label><br>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-lg-3">
                            <div class="form-group">
                                <label for="has_external_battery" class="form-label">แบตเตอรี่ภายนอก</label>
                                <div class="form-check">
                                    @foreach ($exbats as $exbat)
                                        <input class="form-check-input" type="radio" name="has_external_battery" id="has_external_battery" value="{{ $exbat['value'] }}" {{ old('has_exeternal_battery') == $exbat['value'] ? 'checked' : '' }}>
                                        <label class="form-check-label" for="has_external_battery">{{ $exbat['name'] }}</label><br>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <label for="device_management_address" class="form-label">IP address ที่ใช้ควบคุมเครื่อง</label>
                                <input class="form-control @error('device_management_address') is-invalid @enderror" name="device_management_address" id="device_management_address" type="text" value="{{ old('device_management_address') }}" placeholder="127.0.0.1">
                                @error('device_management_address')
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
                    <div class="row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <label for="remarks" class="form-label">หมายเหตุ</label><br>
                                <textarea class="form-control" name="remarks" id="remarks" rows="3">{{ old('remarks') }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">    
                                <label for="issues" class="form-label">ปัญหาในการใช้งาน</label><br>
                                <textarea class="form-control" name="issues" id="issues" rows="3">{{ old('issues') }}</textarea>
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