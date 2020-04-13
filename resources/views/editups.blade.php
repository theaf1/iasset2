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
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6"> <!--รหัส SAP-->
                            <div class="form-group">
                                <label for="sapid">รหัส SAP</label>
                                <input type="text" class="form-control @error('sapid') is-invalid @enderror" id="sapid" name="sapid" placeholder="กรุณาใส่รหัส SAP" value="{{ old('sapid',$ups->sapid) }}" autofocus>
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
                                <input type="text" class="form-control" id="pid" name="pid" placeholder="กรุณาใส่รหัสครุภัณฑ์" value="{{ old('pid',$ups->pid) }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group"><!--ห้อง-->
                                <label for="room">ห้อง</label>
                                <input type="text" class="form-control @error('location_id') is-invalid @enderror" name="room" id="room_autocomplete" placeholder="กรุณาระบุห้องที่เครื่องตั้งอยู่" value="{{ old('room',$ups->room) }}"/>
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
                    <input hidden type="number" name="location_id" value="{{ old('location_id',$ups->location_id) }}"><!--ค่า location_id-->    
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
                                    <input class="form-check-input" type="radio" name="is_mobile" id="is_mobile" value="1">
                                    <label class="form-check-label" for="is_mobile">เป็นเครื่องเคลื่อนที่</label><br>
                                    <input class="form-check-input" type="radio" name="is_mobile" id="is_mobile" value="0" checked>
                                    <label class="form-check-label" for="is_mobile">เป็นเครื่องประจำที่</label><br>
                                </div><br>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6"> <!--ผู้รับผิดชอบ-->
                            <div class="form-group">
                                <label for="response_person">ชื่อผู้รับผิดชอบ</label><br>
                                <input type="text" class="form-control @error('response_person') is-invalid @enderror" id="response_person" name="response_person" value="{{ old('response_person',$ups->response_person) }}">
                                @error('response_person')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6"> <!--หน่วยงาน-->
                            <div class="form-group">
                                <label for="section">หน่วยงาน</label>
                                <select class="form-control @error('section') is-invalid @enderror" id="section" name="section">
                                    <option value="" hidden selected>กรุณาเลือก</option>
                                    @foreach($sections as $section)
                                        <option value="{{ $section['id'] }} {{ old('section',$ups->section) == $section['id']  ? 'selected' : ''}}">{{ $section['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('section')
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
                                <input type="tel" class="form-control @error('tel_no') is-invalid @enderror" name="tel_no" id="tel_no" placeholder="9-7043#107" value="{{ old('tel_no',$ups->tel_no) }}">
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
                                <label for="owner">เจ้าของเครื่อง</label><br>
                                <div class="form-check">
                                    @foreach ($owners as $owner)
                                        <input class="form-check-input @error('owner') is-invalid @enderror" type="radio" name="owner" id="owner" value="{{ $owner['id'] }}" {{ old('owner',$ups->owner) == $owner['id'] ? 'checked' : '' }}>
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
                                    <option value="" hidden>กรุณาเลือก</option>
                                    @foreach($asset_statuses as $asset_status)
                                        <option value="{{ $asset_status['id'] }}" {{ old('asset_status',$ups->asset_status) == $asset_status['id']  ? 'selected' : ''}}>{{ $asset_status['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('asset_status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6"><!--สถานะการใช้งานของครุภัณฑ์-->
                            <div class="form-group">
                                <label for="asset_use_status">สถานะการใช้งานของครุภัณฑ์</label>
                                <select class="form-control @error('asset_use_status') is-invalid @enderror"name="asset_use_status" id="asset_use_status">
                                    <option value="" hidden>กรุณาเลือก</option>
                                    @foreach($asset_use_statuses as $asset_use_status)
                                        <option value="{{ $asset_use_status['id'] }}" {{ old('asset_use_status',$ups->asset_use_status) == $asset_use_status['id']  ? 'selected' : ''}}>{{ $asset_use_status['name'] }}</option>
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
                    <h4>คุณสมบัติเฉพาะ</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6"> <!--ยี่ห้อ-->
                            <div class="form-group">
                                <label for="brand">ยี่ห้อ</label>
                                <input class="form-control @error('brand') is-invalid @enderror" name="brand" id="brand" type="text" value="{{ old('brand',$ups->brand) }}">
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
                                <input class="form-control @error('model') is-invalid @enderror" name="model" id="model" type="text" value="{{ old('model',$ups->model) }}">
                                @error('model')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6"><!--Serial Number จากผู้ผลิต-->
                            <div class="form-group">
                                <label for="serial_no">Serial Number จากผู้ผลิต</label>
                                <input class="form-control @error('serial_no') is-invalid @enderror" name="serial_no" id="serial_no" type="text" value="{{ old('serial_no',$ups->serial_no) }}">
                                @error('serial_no')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6"><!--ลักษณะของตัวเครื่อง-->
                            <div class="form-group">
                            <label for="form_factor">ลักษณะของตัวเครื่อง</label>
                                <div class="form-check">
                                    @foreach ($forms as $form)
                                        <input class="form-check-input" type="radio" name="form_factor" id="form_factor" value="{{ $form['id'] }}"  {{ old('form',$ups->form_factor) == $form['id'] ? 'checked' : '' }}>
                                        <label class="form-check-label" for="form_factor">{{ $form['name'] }}</label><br>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6"><!--หลักการทำงาน-->
                            <div class="form-group">
                                <label for="topology">หลักการทำงาน</label>
                                <select class="form-control @error('topology') is-invalid @enderror" name="topology" id="topology">
                                    <option value="" hidden>กรุณาเลือก</option>
                                    @foreach ($topos as $topo)
                                        <option value="{{ $topo['id'] }}" {{ old('topology',$ups->topology) == $topo['id'] ? 'selected' : '' }}>{{ $topo['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('topology')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6"><!--กำลังไฟรองรับได้สูงสุด(KVA)-->
                            <div class="form-group">
                                <label for="capacity">กำลังไฟรองรับได้สูงสุด(KVA)</label>
                                <input class="form-control @error('capacity') is-invalid @enderror" type="number" name="capacity" id="capacity" value="{{ old('capacity',$ups->capacity) }}" step="0.001">
                                @error('capacity')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-4 col-lg-3">
                            <div class="form-group">
                            <label for="is_modular">ความสามารถในการเปลี่ยนกำลังไฟสูงสุด</label><br>
                                <div class="form-check">
                                    @foreach ($modulars as $modular)
                                        <input class="form-check-input" type="radio" name="is_modular" id="is_modular" value="{{ $modular['value'] }}" {{ old('is_modular',$ups->is_modular) == $modular['value'] ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_modular">{{ $modular['name'] }}</label><br>
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-lg-3">
                            <div class="form-group">
                                <label for="battery_type">ชนิดของแบตเตอรี่</label>
                                <div class="form-check">
                                    @foreach ($bat_types as $bat_type)
                                        <input class="form-check-input" type="radio" name="battery_type" id="battery_type" value="{{ $bat_type['id'] }}" {{ old('battery_type',$ups->battery_type) == $bat_type['id'] ? 'checked' : ''}}>
                                        <label class="form-check-label" for="battery_type">{{ $bat_type['name'] }}</label><br>
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-lg-3">
                            <div class="form-group">
                                <label for="has_external_battery">แบตเตอรี่ภายนอก</label>
                                <div class="form-check">
                                    @foreach ($exbats as $exbat)
                                        <input class="form-check-input" type="radio" name="has_external_battery" id="has_external_battery" value="{{ $exbat['value'] }}" {{ old('has_external_battery',$ups->has_external_battery) == $exbat['value'] ? 'checked' : '' }}>
                                        <label class="form-check-label" for="has_external_battery">{{ $exbat['name'] }}</label><br>
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <label for="device_management_address">IP address ที่ใช้ควบคุมเครื่อง</label>
                                <input class="form-control @error('device_management_address') is-invalid @enderror" name="device_management_address" id="device_management_address" type="text" value="{{ old('device_management_address',$ups->device_management_address) }}" placeholder="127.0.0.1">
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
                    <div class="form-row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <label for="remarks">หมายเหตุ</label><br>
                                <textarea class="form-control" name="remarks" id="remarks" rows="3">{{ old('remarks',$ups->remarks) }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">    
                                <label for="issues">ปัญหาในการใช้งาน</label><br>
                                <textarea class="form-control" name="issues" id="issues" rows="3">{{ old('issues',$ups->issues) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-lg btn-success">บันทึกข้อมูล</button>
                <button type="reset" class="btn btn-lg btn-danger">ยกเลิก</button>
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