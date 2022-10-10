@extends('Layouts.app')
@section('content')
<div class="container-fluid">
    <div class="col-12 mx-auto">
        <form action="{{url('#')}}">
            @if ( $message = Session::get('success')) <!--แจ้งผลการบันทึกข้อมูล-->
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
                    <input type="hidden" id="last_sap" value="{{ $lastinternalsap }}">
                    @csrf
                    <div class="row mb-2 mt-2">
                        <div class="col-sm-12 col-lg-6"> <!-- ชนิดของครุภัณฑ์คอมพิวเตอร์ -->
                             
                                <label for="type" class="form-label">ชนิด</label>
                                <select class="form-select @error('type_id') is-invalid @enderror" id="type" name="type_id">
                                    <option value="" hidden></option>
                                    @foreach($clienttypes as $clienttype)
                                        <option value="{{ $clienttype['id'] }}" {{ old('type_id') == $clienttype['id'] ? 'selected' : ''}}>{{ $clienttype['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('type_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                             
                        </div>     
                        <div class="col-sm-12 col-lg-6"> <!-- รหัส SAP -->
                            
                                <label for="sapid" class="form-label">รหัส SAP</label>
                                <input type="text" class="form-control @error('sapid') is-invalid @enderror" id="sapid" name="sapid" placeholder="กรอกรหัส SAP" value="{{ old('sapid') }}"/><button type="button" class="btn btn-primary mt-3" onclick="generateInternalSAP()">ให้รหัสภายใน</button>
                                <small id="sapid" class="form-text">กรุณาใส่รหัส SAP 12 หลักหากไม่มีให้กดปุ่ม "ให้รหัสภายใน"</small>
                                @error('sapid')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            
                        </div>
                    </div>
                    <div class="row mb-2 mt-2">
                        <div class="col-sm-12 col-lg-6"> <!-- รหัสครุภัณฑ์ -->
                            
                                <label for="pid" class="form-label">รหัสครุภัณฑ์</label>
                                <input type="text" class="form-control" id="pid" name="pid">
                            
                        </div>
                        <div class="col-sm-12 col-lg-6"> <!-- ห้อง -->
                            <label for="room" class="form-label">ห้อง</label>
                            <input type="text" class="form-control @error('location_id') is-invalid @enderror" name="room" id="room_autocomplete"  value="{{ old('room') }}"/>
                            @error('location_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-2 mt-2">
                        <div class="col-sm-12 col-lg-6"> <!-- ตึก -->
                            
                                <label for="building" class="form-label">ตึก</label>
                                <input class="form-control" name="building" id="building" value="{{ old('building') }}"/>
                            
                        </div>
                        <div class="col-sm-12 col-lg-6"> <!-- ชั้น -->
                            
                                <label for="location" class="form-label">ชั้น</label>
                                <input type="text" class="form-control" name="location" id="location" value="{{ old('location') }}"/>
                            
                        </div>
                    </div>
                    <input hidden type="number" name="location_id" value="{{ old('location_id') }}"><!--ค่า location_id-->
                    <div class="row mb-2 mt-2"> 
                        <div class="col-sm-12 col-lg-6"> <!-- ลักษณะการใช้งาน -->
                            <div class="form-group">
                                <label for="is_mobile" class="form-label">ลักษณะการใช้งาน</label><br>
                                <div class="form-check-inline pl-5">
                                    @foreach ($mobiles as $mobile)
                                        <input class="form-check-input @error('mobility_id') is-invalid @enderror" type="radio" name="mobility_id" id="is_mobile" value="{{ $mobile['id'] }}" {{ old('mobility_id') == $mobile['id'] ? 'checked' : ''}}>
                                        <label class="form-check-label" for="is_mobile">{{ $mobile['name'] }}</label>
                                    @endforeach
                                    @error('mobility_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6"> <!-- ระบบงาน -->
                            <div class="form-group">
                                <label for="function" class="form-label">ระบบงาน</label><br>
                                <div class="form-check-inline">
                                    @foreach ($opsfunctions as $opsfunction)
                                        <input type="radio" class="form-check-input @error('function_id') is-invalid @enderror" name="function_id" id="function" value="{{ $opsfunction['id'] }}" {{ old('function_id') == $opsfunction['id'] ? 'checked' : ''}}>
                                        <label class="form-check-label" for="function">{{ $opsfunction['name'] }}</label>
                                    @endforeach
                                    @error('function_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2 mt-2">    
                        <div class="col-sm-12 col-lg-6"> <!-- สถานะของครุภัณฑ์ -->
                            <div class="form-group">
                                <label for="asset_status" class="form-label">สถานะของครุภัณฑ์</label><br>
                                <select class="form-select @error('asset_status_id') is-invalid @enderror" name="asset_status_id" id="asset_status">
                                    <option value="" hidden></option>
                                    @foreach($asset_statuses as $asset_status)
                                        <option value="{{ $asset_status['id'] }}" {{ old('asset_status_id') == $asset_status['id']  ? 'selected' : ''}}> {{ $asset_status['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('asset_status_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <label for="asset_use_status" class="form-label">สถานะการใช้งานของครุภัณฑ์</label> <!--สถานะการใช้งาน-->
                                <select class="form-select @error('asset_use_status_id') is-invalid @enderror" name="asset_use_status_id" id="asset_use_status">
                                    <option value="" hidden></option>
                                    @foreach($asset_use_statuses as $asset_use_status)
                                        <option value="{{ $asset_use_status['id'] }}"  {{ old('asset_use_status_id') == $asset_use_status['id']  ? 'selected' : ''}}>{{ $asset_use_status['name'] }}</option>
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
                    <div class="row mb-2 mt-2"> 
                        <div class="col-sm-12 col-lg-3">  <!-- จำนวนผู้ใช้งาน -->
                            <div class="form-group">
                                <label for="multi_user" class="form-label">จำนวนผู้ใช้งาน</label>
                                <div class="form-check">
                                    @foreach ($multiusers as $multiuser)
                                        <label class="radio"><input type="radio" name="multi_user_id" id="multi_user" value="{{ $multiuser['id'] }}" {{ old('multi_user_id') == $multiuser['id'] ? 'checked' : ''}}> {{ $multiuser['name'] }}</label>
                                    @endforeach                                       
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-3"> <!-- ชื่อผู้ใช้งาน -->
                            <div class="form-group">
                                <label for="user" class="form-label">ชื่อผู้ใช้งาน</label><br>
                                <input type="text" class="form-control @error('user') is-invalid @enderror" id="user" name="user" value="{{ old('user') }}">
                                @error('user')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6"> <!-- ตำแหน่งผู้ใช้งาน -->
                            <div class="form-group">
                                <label for="position" class="form-label">ตำแหน่งผู้ใช้งาน</label> 
                                <select class="form-select @error('position_id') is-invalid @enderror" name="position_id" id="position">
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
                    <div class="row mb-2 mt-2">
                        <div class="col-sm-12 col-lg-6"> <!-- หน่วยงาน -->
                            <div class="form-group">
                                <label for="section" class="form-label">หน่วยงาน</label>
                                <select class="form-select @error('section_id') is-invalid @enderror" name="section_id" id="section">
                                    <option value="" hidden></option>
                                    @foreach($sections as $section)
                                        <option value="{{ $section['id'] }}" {{ old('section_id') == $section['id'] ? 'selected' : ''}}>{{ $section['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('section_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6"> <!-- เจ้าของเครื่อง -->
                            <div class="form-group">
                                <label for="owner" class="form-label">ที่มา</label><br>
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
                    </div>
                    <div class="row mt-2 mb-2">
                        <div class="col-sm-12 col-lg-6"> <!--หมายเลขโทรศัพท์-->
                            <div class="form-group">
                                <label for="tel_no" class="form-label">หมายเลขโทรศัพท์</label>
                                <input type="text" class="form-control @error('tel_no') is-invalid @enderror" name="tel_no" value="{{ old('tel_no') }}">
                                @error('tel_no')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6"> <!-- สิทธิ์ Admin -->
                            <div class="form-group">
                                <div class="form-check">
                                    <label for="permission" class="form-label">สิทธิ์ Admin เครื่อง</label><br>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input @error('permission') is-invalid @enderror" name="permission" id="admin" value="1" {{ old('permission') == 1 ? 'checked' : ''}}>
                                        <label class="form-check-label" for="admin">มีสิทธิ์ admin เครื่อง</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input @error('permission') is-invalid @enderror" name="permission" id="no_permission" value="0" {{ old('permission') == 0 && old('permission') !== null ? 'checked' : ''}}>
                                        <label class="form-check-label" for="no_permission">ไม่มีสิทธิ์ admin เครื่อง</label> 
                                        @error('permission')
                                            <div class="invalid-feedback ml-5">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card mt-4">
    <div class="card-header card-background text-white">
        <h4>คุณสมบัติของเครื่อง</h4>
    </div>
    <div class="card-body">
        <div class="row mb-2 mt-2">
            <div class="col-sm-12 col-lg-6"> <!--ยี่ห้อ-->
                <div class="form-group">
                    <label for="brand" class="form-label">ยี่ห้อ</label>
                    <input class="form-control" name="brand" id="brand" type="text" value="{{ old('brand') }}">
                </div>
            </div>
            <div class="col-sm-12 col-lg-6"> <!--รุ่น-->
                <div class="form-group">
                    <label for="model" class="form-label">รุ่น</label>
                    <input class="form-control" name="model" id="model" type="text" value="{{ old('model') }}">
                </div>
            </div>
        </div>
        <div class="row mb-2 mt-2">
            <div class="col-sm-12 col-lg-6"> <!--serial no.-->
                <div class="form-group">
                    <label for="serial_no" class="form-label">Serial Number จากผู้ผลิต</label>
                    <input class="form-control" name="serial_no" id="serial_no" type="text" value="{{ old('serial_no') }}">
                </div>
            </div>
            <div class="col-sm-12 col-lg-6"> <!--cpu model-->
                <div class="form-group">
                    <label for="cpu_model" class="form-label">CPU Model</label>
                    <input class="form-control @error('cpu_model') is-invalid @enderror" name="cpu_model" id="cpu_model" type="text" value="{{ old('cpu_model') }}">
                    @error('cpu_model')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row mb-2 mt-2">
            <div class="col-sm-12 col-lg-6"> <!--ความเร็ว CPU-->
                <div class="form-group">
                    <label for="cpu_speed" class="form-label">CPU Speed (GHz)</label>
                    <input class="form-control @error('cpu_speed') is-invalid @enderror" name="cpu_speed" id="cpu_speed" type="number" min="0" step="0.1" value="{{ old('cpu_speed') }}">
                    @error('cpu_speed')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-sm-12 col-lg-6"> <!--socket-->
                <div class="form-group">
                    <label for="cpu_socket_number" class="form-label">จำนวน Socket CPU</label>
                    <input class="form-control @error('cpu_socket_number') is-invalid @enderror" name="cpu_socket_number" id="cpu_socket_number" type="number" min="1"  value="{{ old('cpu_socket_number') }}">
                    @error('cpu_socket_number')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row  mb-2 mt-2">
            <div class="col-sm-12 col-lg-6"> <!--RAM-->
                <div class="form-group">
                    <label for="ram_size" class="form-label">RAM Size (GB)</label>
                    <input class="form-control @error('ram_size') is-invalid @enderror" name="ram_size" id="ram_size" type="number" min="0" step="0.1" value="{{ old('ram_size') }}">
                    @error('ram_size')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-sm-12 col-lg-6"> <!--HDD-->
                <div class="form-group">
                    <label for="hdd_no" class="form-label">จำนวน Hard Disk ในเครื่อง</label>
                    <input class="form-control @error('hdd_no') is-invalid @enderror" name="hdd_no" id="hdd_no" type="number" min="1" value="{{ old('hdd_no') }}">
                    @error('hdd_no')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row mb-2 mt-2">
            <div class="col-sm-12 col-lg-6"> <!--HDD capacity-->
                <div class="form-group">
                    <label for=hdd_total_cap class="form-label">ความจุรวมของ HDD</label>
                    <div class="form-check-inline pl-3">
                        @foreach ($dataunits as $dataunit)
                            <input type="radio" class="form-check-input @error('data_unit_id') is-invalid @enderror pl-2" name="data_unit_id" id="data_unit" value="{{ $dataunit['id'] }}" {{ old('data_unit_id') == $dataunit['id'] ? 'checked' : '' }}>
                            <label for="data_unit" class="form-check-label pl-1">{{ $dataunit['name'] }}</label>
                        @endforeach
                        @error('data_unit_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <input class="form-control @error('hdd_total_cap') is-invalid @enderror" name="hdd_total_cap" id="hdd_total_cap" type="number" min="0" step="0.01" value="{{ old('hdd_total_cap') }}">
                    @error('hdd_total_cap')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-sm-12 col-lg-6"> <!--จำนวนจอ-->
                <div class="form-group"> 
                    <label for="display_count" class="form-label">จำนวนจอที่ใช้งาน</label>
                    <select class="form-select @error('display_count') is-invalid @enderror" id="display_count" name="display_count">
                        <option value="" hidden></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                    @error('display_count')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div> 
            </div>
        </div>
        
                    
                        <div class="row mb-2 mt-2">   
                            <div class="col-sm-12 col-lg-3"> <!--sap จอ-->
                                <div class="form-group">
                                    <label for="display_sapid" class="form-label">SAP จอ</label>
                                    <input class="form-control" name="display_sapid" id="display_sapid" type="text" value="{{ old('display_sapid.' . $i) }}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-3"> <!--ครุภัณฑ์จอ-->
                                <div class="form-group">
                                    <label for="display_pid" class="form-label">รหัสครุภัณฑ์จอภาพ</label>
                                    <input class="form-control" name="display_pid" id="display_pid" type="text" value="{{ old('display_pid.' . $i) }}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-3"> <!--ขนาดจอ-->
                                <div class="form-group">
                                    <label for="display_size" class="form-label">ขนาดจอภาพ (นิ้ว)</label>
                                    <input class="form-control @error('display_size') is-invalid @enderror" name="display_size[]" id="display_size" type="number" step="0.1" min="0" value="{{ old('display_size.' . $i) }}">
                                    @error('display_size[]')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-3">
                                <div class="form-group">
                                    <label for="display_ratio" class="form-label">สัดส่วนจอภาพ</label>
                                    <input class="form-control" name="display_ratio" id="display_ratio" type="text" value="{{ old('display_ratio) }}">
                                </div>
                            </div>
                        </div>
                    
                </div>
            
        
    </div>
</div>
@endsection