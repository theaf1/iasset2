@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            @if ( $message = Session::get('success')) <!--แจ้งผลการบันทึกข้อมูล-->
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ $message }}
                </div>
            @endif
            <form action="{{url('/add-loosedisplay')}}" method="post">
                @csrf
                <div class="card mt-4">
                    <div class="card-header card-background text-white">
                        <h4>ข้อมูลครุภัณฑ์พื้นฐาน</h4>
                    </div>
                    <div class="card-body">
                        <input type="hidden" id="last_sap" value="{{ $lastinternalsap }}"> <!--ที่พักค่ารหัสSAP ภายในชั่วคราว-->
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group"> <!--รหัส SAP-->
                                    <label for="display_sapid">รหัส SAP</label>
                                    <input type="text" name="display_sapid" id="display_sapid" value="{{old('display_sapid')}}" class="form-control @error('display_sapid') is-invalid @enderror"><button type="button" class="btn btn-primary mt-3" onclick="generateInternalSAP()">ให้รหัสภายใน</button>
                                    <small id="sapid" class="form-text">กรุณาใส่รหัส SAP 12 หลักหากไม่มีให้กดปุ่ม "ให้รหัสภายใน"</small>
                                    @error('display_sapid')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="display_pid">รหัสครุภัณฑ์</label> <!--รหัสครุภัณฑ์-->
                                    <input type="text" name="display_pid" id="display_pid" value="{{old('display_pid')}}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6"> <!--ที่มา-->
                                <div class="form-group">
                                    <label for="owner">ที่มา</label> 
                                    <div class="form-check-inline pl-2">
                                        @foreach ($owners as $owner)
                                            <input type="radio" class="form-check-input ml-1 @error('owner_id') is-invalid @enderror" name="owner_id" id="owner1" value="{{ $owner['id'] }}" {{ old('owner_id') == $owner['id'] ? 'checked' : '' }}>
                                            <label class="form-check-label" for="owner1">{{ $owner['name'] }}</label>    
                                        @endforeach
                                        @error('owner_id')
                                            <div class="invalid-feedback ml-5">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6"> <!-- ห้อง -->
                                <div class="form-group">
                                    <label for="room">ห้อง</label>
                                    <input type="text" class="form-control @error('location_id') is-invalid @enderror" name="room" id="room_autocomplete"  value="{{ old('room') }}"/>
                                    @error('location_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6"> <!-- ตึก -->
                                <div class="form-group">
                                    <label for="building">ตึก</label>
                                    <output type="text" class="form-control" name="building" id="building" value="{{ old('building') }}"/>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6"> <!-- ชั้น -->
                                <div class="form-group">
                                    <label for="location">ชั้น</label>
                                    <input type="text" class="form-control" name="location" id="location" value="{{ old('location') }}"/>
                                </div>
                            </div>
                            <input hidden type="number" name="location_id" value="{{ old('location_id') }}"><!--ค่า location_id-->
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6"> <!--หน่วยงาน-->
                                <div class="form-group">
                                    <label for="section">หน่วยงาน</label>
                                    <select class="form-control @error('section_id') is-invalid @enderror" name="section_id" id="section">
                                        <option value="">กรุณาเลือกหน่วยงาน</option>
                                        @foreach ($sections as $section)
                                            <option value="{{$section['id']}}" {{old('section_id') == $section['id'] ? 'selected': ''}}>{{$section['name']}}</option>
                                        @endforeach
                                    </select>
                                    @error('section_id')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6"> <!--ผู้รับผิดชอบ-->
                                <div class="form-group">
                                    <label for="response_person">ผู้รับผิดชอบ</label>
                                    <input type="text" name="response_person" id="response_person" value="{{old('response_person')}}" class="form-control @error('response_person') is-invalid @enderror">
                                    @error('response_person')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6"> <!--ตำแหน่ง-->
                                <div class="form-group">
                                    <label for="position">ตำแหน่งผู้รับผิดชอบ</label>
                                    <select class="form-control @error('position_id') is-invalid @enderror" name="position_id" id="position">
                                        <option value=""></option>
                                        @foreach ($positions as $position)
                                            <option value="{{$position['id']}}" {{old('position_id') == $position['id'] ? 'selected' : ''}}>{{$position['name']}}</option>
                                        @endforeach
                                    </select>
                                    @error('position_id')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6"> <!--หมายเลขโทรศัพท์-->
                                <div class="form-group">
                                    <label for="tel_no">หมายเลขโทรศัพท์</label>
                                    <input class="form-control @error('tel_no') is-invalid @enderror" type="tel" value="{{old('tel_no')}}" name="tel_no" id="tel_no">
                                    @error('tel_no')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6"> <!--สถานะครุภัณฑ์-->
                                <div class="form-group">
                                    <label for="asset_status">สถานะของครุภัณฑ์</label>
                                    <select name="asset_status_id" id="asset_status" class="form-control @error('asset_status_id') is-invalid @enderror">
                                        <option value=""></option>
                                        @foreach ($asset_statuses as $asset_status)
                                            <option value="{{$asset_status['id']}}" {{old('asset_status_id') == $asset_status['id'] ? 'selected' : ''}}>{{$asset_status['name']}}</option>
                                        @endforeach
                                    </select>
                                    @error('asset_status_id')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6"> <!--สถานะการใช้ครุภัณฑ์-->
                                <div class="form-group">
                                    <label for="asset_use_status">สถานะการใช้งานของครุภัณฑ์</label>
                                    <select name="asset_use_status_id" id="asset_use_status" class="form-control @error('asset_use_status_id') is-invalid @enderror">
                                        <option value="" hidden></option>
                                        @foreach ($asset_use_statuses as $asset_use_status)
                                            <option value="{{$asset_use_status['id']}}" {{old('asset_use_status_id') == $asset_use_status['id'] ? 'selected' : ''}}>{{$asset_use_status['name']}}</option>
                                        @endforeach
                                    </select>
                                    @error('asset_use_status_id')
                                        <div class="invalid-feedback">
                                            {{$message}}
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
                                    <input type="text" name="brand" id="brand" value="{{old('brand')}}" class="form-control @error('brand') is-invalid @enderror">
                                    @error('brand')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6"> <!--รุ่น-->
                                <div class="form-group">
                                    <label for="model">รุ่น</label>
                                    <input type="text" name="model" id="model" value="{{old('model')}}" class="form-control @error('model') is-invalid @enderror">
                                    @error('model')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6"> <!--serial number-->
                                <div class="form-group">
                                    <label for="serial_no">serial number</label>
                                    <input type="text" name="serial_no" id="serial_no" value="{{old('serial_no')}}" class="form-control @error('serial_no') is-invalid @enderror">
                                    @error('serial_no')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3"> <!--ชนิดจอภาพ-->
                                <div class="form-group">
                                    <label for="displaytype">ชนิดของจอภาพ</label>
                                    <select name="display_type_id" id="displaytype" class="form-control @error('display_type_id') is-invalid @enderror">
                                        <option value="" hidden></option>
                                        @foreach ($displaytypes as $displaytype)
                                            <option value="{{$displaytype['id']}}" {{old('display_type_id') == $displaytype['id'] ? 'selected' : ''}}>{{$displaytype['name']}}</option>
                                        @endforeach
                                    </select>
                                    @error('display_type_id')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3"> <!--ขนาดจอภาพ-->
                                <div class="form-group">
                                    <label for="display_size">ขนาดจอภาพ (นิ้ว)</label>
                                    <input type="number" name="display_size" id="display_size" value="{{old('display_size')}}" class="form-control @error('display_size') is-invalid @enderror" min="0">
                                    @error('display_size')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6"> <!--สัดส่วนจอภาพ-->
                                <div class="form-group">
                                    <label for="display_ratio">สัดส่วนจอภาพ</label>
                                    <select name="display_ratio_id" id="display_ratio" class="form-control  @error('display_ratio_id') is-invalid @enderror">
                                        <option value=""></option>
                                        @foreach ($displayratios as $displayratio)
                                            <option value="{{$displayratio['id']}}" {{old('display_ratio_id') == $displayratio['id'] ? 'selected' : ''}}>{{$displayratio['name']}}</option>
                                        @endforeach
                                    </select>
                                    @error('display_ratio_id')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6"> <!--สัญญาณที่รองรับ-->
                                <div class="form-group">
                                    <label for="signal_types">รองรับสัญญาณภาพ</label>
                                    <div class="form-check">
                                        <label class="checkbox-inline"><input type="checkbox" name="is_vga" value="1" {{old('is_vga') == 1 ? 'checked' : ''}}> VGA</label>
                                    </div>
                                    <div class="form-check">
                                        <label class="checkbox-inline"><input type="checkbox" name="is_dvi" value="1" {{old('is_dvi') == 1 ? 'checked' : ''}}> DVI</label>
                                    </div>
                                    <div class="form-check">
                                        <label class="checkbox-inline"><input type="checkbox" name="is_hdmi" value="1" {{old('is_hdmi') == 1 ? 'checked' : ''}}> HDMI</label>
                                    </div>
                                    <div class="form-check">
                                        <label class="checkbox-inline"><input type="checkbox" name="is_dp" value="1" {{old('is_dp') == 1 ? 'checked' : ''}}> DisplayPort</label>
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
                            <div class="col-sm-12 col-lg-6"> <!--ปัญหาการใช้งาน-->
                                <div class="form-group">
                                    <label for="issues">ปัญหาในการใช้งาน</label>
                                    <textarea name="issues" id="issues" rows="5" class="form-control">{{old('issues')}}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6"> <!--หมายเหตุ-->
                                <div class="form-group">
                                    <label for="remarks">หมายเหตุ</label>
                                    <textarea name="remarks" id="remarks" rows="5" class="form-control">{{old('remarks')}}</textarea>
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
@section('js') <!--script จอกับห้อง-->
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
    // script generate internal SAP
    function generateInternalSAP() {
        var lastsap = document.getElementById("last_sap").value
        if(lastsap == 0)
        {
            document.getElementById("display_sapid").value = 'MED-001'
            return true
        }
        var splitsap = lastsap.split("-")
        console.log(splitsap)
        
        internalsap = parseInt(splitsap[1])+1
        document.getElementById("display_sapid").value = 'MED-'+internalsap
    }
</script>
@endsection