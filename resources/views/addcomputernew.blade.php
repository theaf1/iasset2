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
                                <select class="form-select @error('display_count') is-invalid @enderror" id="display_count" name="display_count" onchange="displayCountSelected(this)">
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
                    @if (session()->has('displayCount')) <!--script จอภาพ-->
                        <?php $displayCount = session()->get('displayCount') ? session()->get('displayCount') : $client->displays->count() ?>
                        @for ($i = 0; $i < session()->get('displayCount') ; $i++)
                            <div class="card mt-2 mb-2">
                                <div class="card-header card-background text-white">
                                    จอภาพที่ {{$i+1}}
                                </div>
                                <div class="card-body">
                                    <div class="row mb-2 mt-2">   
                                        <div class="col-sm-12 col-lg-3"> <!--sap จอ-->
                                            <div class="form-group">
                                                <label for="display_sapid" class="form-label">SAP จอ</label>
                                                <input class="form-control" name="display_sapid" id="display_sapid" type="text" value="{{ old('display_sapid') }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-3"> <!--ครุภัณฑ์จอ-->
                                            <div class="form-group">
                                                <label for="display_pid" class="form-label">รหัสครุภัณฑ์จอภาพ</label>
                                                <input class="form-control" name="display_pid" id="display_pid" type="text" value="{{ old('display_pid') }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-3"> <!--ขนาดจอ-->
                                            <div class="form-group">
                                                <label for="display_size" class="form-label">ขนาดจอภาพ (นิ้ว)</label>
                                                <input class="form-control @error('display_size') is-invalid @enderror" name="display_size" id="display_size" type="number" step="0.1" min="0" value="{{ old('display_size') }}">
                                                @error('display_size')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                            <div class="col-sm-12 col-lg-3">
                                                <div class="form-group">
                                                    <label for="display_ratio" class="form-label">สัดส่วนจอภาพ</label>
                                                    <input class="form-control" name="display_ratio" id="display_ratio" type="text" value="{{ old('display_ratio')}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    @endif
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>ข้อมูลด้าน software</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-2 mt-2">
                        <div class="col-sm-12 col-lg-6"> <!--OS-->
                            <div class="form-group">
                                <label for="os_id" class="form-label">OS</label>
                                <select class="form-select @error('os_id') is-invalid @enderror" name="os_id" id="os_id">
                                    <option value="" hidden></option>
                                    @foreach ($clientoses as $clientos)
                                        <option value="{{$clientos['id']}}" {{ old('os_id') == $clientos['id'] ? 'selected' : '' }}>{{$clientos['name']}}</option>
                                    @endforeach
                                </select>
                                @error('os_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6"> <!--os architecture-->
                            <div class="form-group">
                                <label for="os_arch" class="form-label">OS architecture</label><br>
                                <div class="form-check">
                                    @foreach ($os_arches as $os_arch)
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input @error('os_arch_id') is-invalid @enderror" name="os_arch_id" id="os_arch" value="{{ $os_arch['id'] }}" {{ old('os_arch_id') == $os_arch['id'] ? 'checked' : ''}}><label class="form-check-label @error('os_arch_id') is-invalid @enderror" for="os_arch"> {{ $os_arch['name'] }}</label><br>
                                            @error('os_arch_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2 mt-2">
                        <div class="col-sm-12 col-lg-6"> <!--office version-->
                            <div class="form-group">
                                <label for="ms_office_version" class="form-label">Microsoft Office Version</label>
                                <input type="text" class="form-control @error('ms_office_version') is-invalid @enderror" name="ms_office_version" id="ms_office_version" value="{{ old('ms_office_version') }}">
                                @error('ms_office_version')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6"> <!--antivirus-->
                            <div class="form-group">
                                <label for="antivirus" class="form-label">Antivirus</label>
                                <input class="form-control @error('antivirus') is-invalid @enderror" name="antivirus" id="antivirus" type="text" value="{{ old('antivirus') }}">
                                @error('antivirus')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2 mt-2">
                        <div class="col-sm-12 col-lg-6"> <!--pdf reader-->
                            <div class="form-group">
                                <label for="pdf_reader" class="form-label">PDF reader</label>
                                <input class="form-control @error('pdf_reader') is-invalid @enderror" name="pdf_reader" id="pdf_reader" type="text" value="{{ old('pdf_reader') }}">
                                @error('pdf_reader')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <label for="endnote" class="form-label">Endnote Version</label>
                                <input type="text" name="endnote_version" id="endnote" class="form-control" value="{{ old('endnote_version') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row  mb-2 mt-2">
                        <div class="col-sm-12 col-lg-6"> <!--ie version-->
                            <div class="form-group">
                                <label for="ie_version" class="form-label">IE version</label>
                                <input class="form-control @error('ie_version') is-invalid @enderror" name="ie_version" id="ie_version" type="number" value="{{ old('ie_version') }}">
                                @error('ie_version')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="form-group">
                                <label for="firefox" class="form-label">Firefox Version</label>
                                <input type="text" name="firefox_version" id="firefox" class="form-control" value="{{ old('firefox_version') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2 mt-2">
                        <div class="col-sm-12 col-lg-6"> <!--chrome-version-->
                            <div class="form-group">
                                <label for="chrome_version" class="form-label">Chrome version</label>
                                <input class="form-control" name="chrome_version" id="chrome_version" type="text" value="{{ old('chrome_version') }}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6"> <!--spss version-->
                            <div class="form-group">
                                <label for="spss_version" class="form-label">SPSS version</label>
                                <input class="form-control" name="spss_version" id="spss_version" type="number" value="{{ old('spss_version') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2 mt-2">
                        <div class="col-sm-12 col-lg-6"> <!--program ระบบ รพ-->
                            <div class="form-group">
                                <label for="faculty_software" class="form-label">Software คณะ</label><br>
                                <div class="form-check-inline">
                                    <label class="checkbox-inline"><input type="checkbox" name="ehis" value="1" {{ old('ehis') == 1 ? 'checked' : ''}} > E-HIS</label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="checkbox-inline"><input type="checkbox" name="sipacs" value="1" {{ old('sipacs') == 1 ? 'checked' : ''}} > SiPACS</label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="checkbox-inline"><input type="checkbox" name="si_iscan" value="1" {{ old('si_iscan') == 1 ? 'checked' : ''}} > Si-iScan</label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="checkbox-inline"><input type="checkbox" name="eclair" value="1" {{ old('eclair') == 1 ? 'checked' : ''}} > eclair</label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="checkbox-inline"><input type="checkbox" name="admission_note" value="1" {{ old('admission_note') == 1 ? 'checked' : ''}} > Admission Notes</label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="checkbox-inline"><input type="checkbox" name="ur_ward" value="1" {{ old('ur_ward') == 1 ? 'checked' : ''}} > UR-Ward</label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="checkbox-inline"><input type="checkbox" name="sinet" value="1" {{ old('sinet') == 1 ? 'checked' : ''}} > SiNet</label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="checkbox-inline"><input type="checkbox" name="zoom" id="zoom" value="1" {{ old('zoom') == 1 ? 'checked' : '' }}> Zoom</label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="checkbox-inline"><input type="checkbox" name="webex" id="webex" value="1" {{ old('webex') == 1 ? 'checked' : '' }}> Webex</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6"> <!--other software details-->
                            <div class="form-group">
                                <label for="other_software_detail" class="form-label">Software อื่นๆ</label>
                                <textarea class="form-control" name="other_software_detail" id="other_software_detail" rows="1">{{ old('other_software_detail') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>ข้อมูลด้านเครือข่าย</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-2 mt-2">
                        <div class="col-sm-12 col-lg-6"> <!--lan type-->
                            <div class="form-group">
                                <label for="lan_type" class="form-label">ประเภทเครือข่าย</label><br>
                                <select name="lan_type_id" id="lan_type" class="form-select @error('lan_type_id') is-invalid @enderror">
                                    <option value="" hidden></option>
                                    @foreach($networkconnections as $networkconnection)
                                        <option value="{{ $networkconnection['id'] }}" {{ old('lan_type_id') == $networkconnection['id'] ? 'selected' : ''}}>{{ $networkconnection['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('lan_type_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6"> <!--lan outlet-->
                            <div class="form-group">
                                <label for="lan_outlet_no" class="form-label">LAN outlet No</label>
                                <input class="form-control" name="lan_outlet_no" id="lan_outlet_no" type="text" value="{{ old('lan_outlet_no') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2 mt-2">
                        <div class="col-sm-12 col-lg-6"> <!--ip address-->
                            <div class="form-group">
                                <label for="ip_address" class="form-label">IP Address</label>
                                <input class="form-control @error('ip_address') is-invalid @enderror" name="ip_address" id="ip_address" type="text" value="{{ old('ip_address') }}">
                                @error('ip_address')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6"> <!--mac address-->
                            <div class="form-group">
                                <label for="mac_address" class="form-label">MAC Address</label>
                                <input class="form-control @error('mac_address') is-invalid @enderror" name="mac_address" id="mac_address" type="text" value="{{ old('mac_address') }}">
                                @error('mac_address')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror    
                            </div>
                        </div>
                    </div>
                    <div class="row  mb-2 mt-2">
                        <div class="col sm-12 col-lg-6"><!--computer name-->
                            <div class="form-group">
                                <label for="computer_name" class="form-label">Computer Name</label>
                                <input class="form-control @error('computer_name') is-invalid @enderror" name="computer_name" id="computer_name" type="text" value="{{ old('computer_name') }}">
                                @error('computer_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6"> <!--wireless-->
                            <div class="form-group">
                                <label for="is_wireless" class="form-label">การใช้งานเครือข่ายไร้สาย</label>
                                <div class="form-check">
                                    <label class="checkbox"><input type="checkbox" name="is_wireless" value="1" {{ old('is_wireless') == 1 ? 'checked' : ''}}> ใช้เครือข่ายไร้สาย</label>
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
                    <div class="row mb-2 mt-2">
                        <div class="col-sm-12 col-lg-6"> <!-- หมายเหตุ -->
                            <div class="form-group">
                                <label for="remarks" class="form-label">หมายเหตุ</label><br>
                                <textarea class="form-control" name="remarks" id="remarks" rows="3">{{ old('remarks') }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6"> <!--issues-->
                            <div class="form-group">
                                <label for="issues" class="form-label">ปัญหาในการใช้งาน</label>
                                <textarea class="form-control" name="issues" id="issues" rows="3">{{ old('issues') }}</textarea>
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
        let hasDisplay = "<?php echo session()->get('displayCount'); ?>";
        if (hasDisplay > 0) {
            $('#display_count').focus();
        }
        console.log(hasDisplay)
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
        // sessionStorage.setItem(displayCount);
        document.getElementById("computer_form").action = `{{ url('/add-computer?displayCount=${displayCount}')}}`;
        document.getElementById("computer_form").submit();
        // let Testitem = sessionStorage.getItem(displayCount);
        console.log(displayCount)
        // console.log(Testitem)
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