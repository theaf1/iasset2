@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            <form action="#" method="post">
                @csrf
                <div class="card mt-4">
                    <div class="card-header card-background text-white">
                        <h4>ข้อมูลครุภัณฑ์พื้นฐาน</h4>
                    </div>
                    <div class="card-body">    
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="display_sapid">รหัส SAP</label>
                                    <input type="text" name="display_sapid" id="display_sapid" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-3">
                                <div class="form-group">
                                    <label for="display_pid">รหัสครุภัณฑ์</label>
                                    <input type="text" name="display_pid" id="display_pid" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-3">
                                <div class="form-group">
                                    <label for="year">ปี พ.ศ.</label>
                                    <input class="form-control" type="number" name="year" id="year">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6"> <!-- ห้อง -->
                                <div class="form-group">
                                    <label for="room">ห้อง</label>
                                    <input type="text" class="form-control @error('location_id') is-invalid @enderror" name="room" id="room_autocomplete"  value="{{ old('room') }}"/>
                                    {{-- @error('location_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror --}}
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6"> <!-- ตึก -->
                                <div class="form-group">
                                    <label for="building">ตึก</label>
                                    <output type="text" class="form-control" name="building" id="building" value="{{ old('building') }}"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6"> <!-- ชั้น -->
                                <div class="form-group">
                                    <label for="location">ชั้น</label>
                                    <input type="text" class="form-control" name="location" id="location" value="{{ old('location') }}"/>
                                </div>
                            </div>
                            <input hidden type="number" name="location_id" value="{{ old('location_id') }}"><!--ค่า location_id-->
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="section">หน่วยงาน</label>
                                    <select class="form-control" name="section_id" id="section">
                                        <option value="">กรุณาเลือกหน่วยงาน</option>
                                        @foreach ($sections as $section)
                                            <option value="{{$section['id']}}">{{$section['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="response_person">ผู้รับผิดชอบ</label>
                                    <input type="text" name="response_person" id="response_person" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-3">
                                <div class="form-group">
                                    <label for="position">ตำแหน่งผู้รับผิดชอบ</label>
                                    <select class="form-control" name="position_id" id="position">
                                        @foreach ($positions as $position)
                                            <option value="{{$position['id']}}">{{$position['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-3">
                                <div class="form-group">
                                    <label for="tel_no">หมายเลขโทรศัพท์</label>
                                    <input class="form-control" type="tel" name="tel_no" id="tel_no">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="asset_status">สถานะของครุภัณฑ์</label>
                                    <select name="asset_status_id" id="asset_status" class="form-control">
                                        @foreach ($asset_statuses as $asset_status)
                                            <option value="{{$asset_status['id']}}">{{$asset_status['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="asset_use_status">สถานะการใช้งานของครุภัณฑ์</label>
                                    <select name="asset__use_status_id" id="asset_use_status" class="form-control">
                                        @foreach ($asset_use_statuses as $asset_use_status)
                                            <option value="{{$asset_use_status['id']}}">{{$asset_use_status['name']}}</option>
                                        @endforeach
                                    </select>
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
                            <div class="col-sm12 col-lg-6">
                                <div class="form-group">
                                    <label for="brand">ยี่ห้อ</label>
                                    <input type="text" name="brand" id="brand" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="model">รุ่น</label>
                                    <input type="text" name="model" id="model" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="display_size">ขนาดจอภาพ (นิ้ว)</label>
                                    <input type="number" name="display_size" id="display_size" class="form-control" min="0">
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="display_ratio">สัดส่วนจอภาพ</label>
                                    <select name="display_ratio_id" id="display_ratio" class="form-control">
                                        <option value="1">4:3</option>
                                        <option value="2">16:9</option>
                                        <option value="3">16:10</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-lg-6">
                                <div class="form-group">
                                    <label for="signal_types">รองรับสัญญาณภาพ</label>
                                    <div class="form-check">
                                        <label class="checkbox-inline"><input type="checkbox" name="is_vga" value="1"> VGA</label>
                                    </div>
                                    <div class="form-check">
                                        <label class="checkbox-inline"><input type="checkbox" name="is_dvi" value="1"> DVI</label>
                                    </div>
                                    <div class="form-check">
                                        <label class="checkbox-inline"><input type="checkbox" name="is_hdmi" value="1"> HDMI</label>
                                    </div>
                                    <div class="form-check">
                                        <label class="checkbox-inline"><input type="checkbox" name="is_dp" value="1"> DisplayPort</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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