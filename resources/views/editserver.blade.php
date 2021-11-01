@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            <form action="{{ url('/server/' . $server->id . '/update') }}" method="post" id="server_form">
                <input type="hidden" name="_method" value="PUT">
                @if ( $message = Session::get('success'))<!--แจ้งผลบันทึกข้อมูล-->
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ $message }}
                    </div>
                @endif
                <div class="card mt-4">
                    <div class="card-header card-background text-white">
                        <h4>ข้อมูลทั่วไปของครุภัณฑ์</h4>
                    </div>
                    <div class="card-body">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 col-lg-6"> <!--รหัส SAP-->
                                <div class="form-group">
                                    <label for="sapid" class="form-label">รหัส SAP</label>
                                    <input type="text" class="form-control @error('sapid') is-invalid @enderror" id="sapid" name="sapid" autofocus value="{{ old('sapid',$server->sapid) }}">
                                    @error('sapid')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6"> <!--รห้สครุภัณฑ์-->
                                <div class="form-group">
                                    <label for="pid" class="form-label">รหัสครุภัณฑ์</label>
                                    <input type="text" class="form-control" id="pid" name="pid" value="{{ old('pid',$server->pid) }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6"> <!--ที่ตั้ง-->
                                <div class="form-group">
                                    <label for="room_autocomplete" class="form-label">สถานที่ตั้ง</label>
                                    <input type="text" class="form-control @error('location_id') is-invalid @enderror" name="room" id="room_autocomplete" placeholder="กรุณาระบุห้องที่เครื่องตั้งอยู่" value="{{ old('room',$server->ServerRoom->name) }}"/>
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
                                    <input type="text" class="form-control" name="building" id="building" disabled/>
                                </div>
                            </div>
                        </div>
                        <input hidden type="number" name="location_id" value="{{ old('location_id',$server->location_id) }}"><!--ค่า location_id-->    
                        <div class="row">
                            <div class="col-sm-12 col-lg-6"><!-- ชั้น -->
                                <div class="form-group">
                                    <label for="location" class="form-label">ชั้น</label>
                                    <input type="text" class="form-control" name="location" id="location" disabled/>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6"> <!--การติดตั้ง-->
                                <div class="form-group">
                                <label for="is_mobile" class="form-label">ลักษณะการติดตั้ง</label><br>
                                    <div class="form-check form-check-inline">
                                        @foreach ($mobiles as $mobile)
                                            <input class="form-check-input @error('mobility_id') is-invalid @enderror" type="radio" name="mobility_id" id="is_mobile" value="{{ $mobile['id'] }}" {{ old('mobility_id',$server->mobility_id) == $mobile['id'] && old('mobility_id',$server->mobility_id) !== null ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_mobile">{{ $mobile['name'] }}</label><br>
                                        @endforeach
                                        @error('mobility_id')
                                            <div class="invalid-feedback">
                                                {{ $message}}
                                            </div>
                                        @enderror
                                    </div>
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
                                            <option value="{{ $section['id'] }}" {{ old('section_id',$server->section_id) == $section['id'] ? 'selected' : ''}}>{{ $section['name'] }}</option>
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
                                <input type="text" class="form-control @error('tel_no') is-invalid @enderror" name="tel_no" id="tel_no" placeholder="9-9999" value="{{ old('tel_no',$server->tel_no) }}">
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
                                <input type="text" class="form-control @error('response_person') is-invalid @enderror" id="response_person" name="response_person" value="{{ old('response_person',$server->response_person) }}">
                                    @error('response_person')
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
                                            <input class="form-check-input @error('owner_id') is-invalid @enderror" type="radio" name="owner_id" id="owner" value="{{ $owner['id'] }}" {{ old('owner_id',$server->owner_id) == $owner['id'] ? 'checked' : ''}}>
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
                                        <option value="{{ $asset_status['id'] }}" {{ old('asset_status_id',$server->asset_status_id) == $asset_status['id'] ? 'selected' : '' }}>{{ $asset_status['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('asset_status_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6"><!--สถานะการใช้งาน-->
                            <div class="form-group">
                            <label for="asset_use_status" class="form-label">สถานะการใช้งานของครุภัณฑ์</label>
                                <select class="form-select @error('asset_use_status_id') is-invalid @enderror" name="asset_use_status_id" id="asset_use_status">
                                    <option value="" hidden></option>
                                    @foreach($asset_use_statuses as $asset_use_status)
                                        <option value="{{ $asset_use_status['id'] }}" {{ old('asset_use_status_id',$server->asset_use_status_id) == $asset_use_status['id'] ? 'selected' : '' }}>{{ $asset_use_status['name'] }}</option>
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
                        <div class="row">
                            <div class="col-sm-12 col-lg-6"> <!--ยี่ห้อ-->
                                <div class="form-group">
                                    <label for="brand" class="form-label">ยี่ห้อ</label>
                                <input class="form-control @error('brand') is-invalid @enderror" name="brand" id="brand" type="text" value="{{ old('brand',$server->brand) }}">
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
                                <input class="form-control @error('model') is-invalid @enderror" name="model" id="model" type="text" value="{{ old('model',$server->model) }}">
                                    @error('model')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6"><!--serial no.-->
                                <div class="form-group">
                                    <label for="serial_no" class="form-label">Serial Number จากผู้ผลิต</label>
                                    <input class="form-control @error('serial_no') is-invalid @enderror" name="serial_no" id="serial_no" type="text" value="{{ old('serial_no',$server->serial_no) }}">
                                    @error('serial_no')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>              
                            <div class="col-sm-12 col-lg-6"> <!--form factor-->
                                <div class="form-group">
                                    <label for="form-factor" class="form-label">ลักษณะของเครื่อง</label>
                                    <div class="form-check">
                                        @foreach ($forms as $form)
                                            <input class="form-check-input" type="radio" name="form_factor_id" id="form_factor" value="{{ $form['id'] }}" {{old('form_factor_id',$server->form_factor_id) == $form['id'] ? 'checked' : '' }}>
                                            <label class="form-check-label" for="form_factor">{{ $form['name'] }}</label><br>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">    
                            <div class="col-sm-12 col-lg-6"> <!--cpu model-->
                                <div class="form-group">
                                    <label for="cpu_model">CPU Model</label>
                                <input class="form-control @error('cpu_model') is-invalid @enderror" name="cpu_model" id="cpu_model" type="text" value="{{ old('cpu_model',$server->cpu_model) }}">
                                    @error('cpu_model')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6"> <!--cpu speed-->
                                <div class="form-group">
                                    <label for="cpu_speed" class="form-label">CPU Speed (GHz)</label>
                                <input class="form-control @error('cpu_speed') is-invalid @enderror" name="cpu_speed" id="cpu_speed" type="number" min="0" step="0.1" value="{{ old('cpu_speed',$server->cpu_speed) }}">
                                    @error('cpu_speed')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6"> <!--socket-->
                                <div class="form-group">
                                    <label for="cpu_socket_no" class="form-label">จำนวน Socket CPU</label>
                                <input class="form-control @error('cpu_socket_no') is-invalid @enderror" name="cpu_socket_no" id="cpu_socket_no" type="number" min="0" value="{{ old('cpu_socket_no',$server->cpu_socket_no) }}">
                                    @error('cpu_socket_no')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6"> <!--RAM-->
                                <div class="form-group">
                                    <label for="ram_size" class="form-label">RAM Size (GB)</label>
                                <input class="form-control @error('ram_size') is-invalid @enderror" name="ram_size" id="ram_size" type="number" min="0" step="0.1" value="{{ old('ram_size',$server->ram_size) }}">
                                    @error('ram_size')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6"> <!--raid-->
                                <div class="form-group">
                                    <label for="is_raid" class="form-label">RAID</label><br>
                                    <div class="form-check-inline">
                                        <label class="form-check-label"><input type="checkbox" class="form-check-input" name="is_raid" id="is_raid" value="1" {{ old('is_raid',$server->is_raid) == 1 ? 'checked' : ''}}><label for="is_raid">RAID</label></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3"><!--HDD สูงสุด-->
                                <div class="form-group">
                                    <label for="no_of_physical_drive_max" class="form-label">จำนวน Hard Disk สูงสุดที่ยอมรับได้ (ลูก)</label>
                                    <input class="form-control @error('no_of_physical_drive_max') is-invalid @enderror" name="no_of_physical_drive_max" id="no_of_physical_drive_max" type="number" value="{{ old('no_of_physical_drive_max',$server->no_of_physical_drive_max) }}">
                                    @error('no_of_physical_drive_max')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3"> <!--จำนวน Hard Disk ที่มีอยู่-->
                                <div class="form-group">
                                    <label for="no_of_physical_drive_populated" class="form-label">จำนวน Hard Disk ที่มีอยู่ (ลูก)</label>
                                    <input class="form-control @error('no_of_physical_drive_populated') is-invalid @enderror" name="no_of_physical_drive_populated" id="no_of_physical_drive_populated" type="number" min="2" value="{{ old('no_of_physical_drive_populated',$server->no_of_physical_drive_populated) }}">
                                    @error('no_of_physical_drive_populated')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class="col-sm-12 col-lg-6"> <!--HDD capacity-->
                                <div class="form-group">
                                    <label for=hdd_total_cap class="form-label">ความจุรวมของ HDD</label>
                                        <div class="form-check-inline pl-1">
                                            @foreach ($dataunits as $dataunit)
                                                <input type="radio" class="form-check-input @error('data_unit_id') is-invalid @enderror" name="data_unit_id" id="data_unit" value="{{ $dataunit['id'] }}" {{ old('data_unit_id',$server->data_unit_id) == $dataunit['id'] ? 'checked' : '' }}>
                                                <label for="data_unit" class="form-check-label">{{ $dataunit['name'] }}</label>
                                            @endforeach
                                            @error('data_unit_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    <input class="form-control @error('hdd_total_cap') is-invalid @enderror" name="hdd_total_cap" id="hdd_total_cap" type="number" min="0" value="{{ old('hdd_total_cap',$server->hdd_total_cap) }}">
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
                                        <option value="1" {{ old('display_count', session()->has('displayCount') ? session()->has('displayCount') : $server->ServerDisplay->count()) == 1 ? 'selected' : ''}}>1</option>
                                        <option value="2" {{ old('display_count', session()->has('displayCount') ? session()->has('displayCount') : $server->ServerDisplay->count()) == 2 ? 'selected' : ''}}>2</option>
                                        <option value="3" {{ old('display_count', session()->has('displayCount') ? session()->has('displayCount') : $server->ServerDisplay->count()) == 3 ? 'selected' : ''}}>3</option>
                                        <option value="4" {{ old('display_count', session()->has('displayCount') ? session()->has('displayCount') : $server->ServerDisplay->count()) == 4 ? 'selected' : ''}}>4</option>
                                    </select>
                                    @error('display_count')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        @if (session()->has('displayCount') || $server->ServerDisplay ) <!--script จอภาพ-->
                        <?php $displayCount = session()->get('displayCount') ? session()->get('displayCount') : $server->ServerDisplay->count() ?>
                            @for ($i = 0; $i < $displayCount ; $i++)
                                <div class="card mt-4 mb-2">
                                    <div class="card-header card-background text-white">
                                        จอภาพที่ {{ $i+1 }}
                                    </div>
                                    <div class="card-body pt-1 pb-1" >
                                        <div class="row">   
                                            <div class="col-sm-12 col-lg-3"> <!--sap จอ-->
                                                <div class="form-group">
                                                    <label for="display_sapid" class="form-label">SAP จอ</label>
                                                    <input class="form-control" name="display_sapid[]" id="display_sapid" type="text" value="{{ old('display_sapid.' . $i, isset($server->ServerDisplay[$i]) ? $server->ServerDisplay[$i]->display_sapid : null) }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-lg-3"> <!--ครุภัณฑ์จอ-->
                                                <div class="form-group">
                                                    <label for="display_pid" class="form-label">รหัสครุภัณฑ์จอภาพ</label>
                                                    <input class="form-control" name="display_pid[]" id="display_pid" type="text" value="{{ old('display_pid.' . $i, isset($server->ServerDisplay[$i]) ? $server->ServerDisplay[$i]->display_pid : null) }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-lg-3"> <!--ขนาดจอ-->
                                                <div class="form-group">
                                                    <label for="display_size" class="form-label">ขนาดจอภาพ (นิ้ว)</label>
                                                    <input class="form-control" name="display_size[]" id="display_size" type="number" step="0.1" min="0" value="{{ old('display_size.' . $i, isset($server->ServerDisplay[$i]) ? $server->ServerDisplay[$i]->display_size : null) }}"">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-lg-3">
                                                <div class="form-group">
                                                    <label for="display_ratio" class="form-label">สัดส่วนจอภาพ</label>
                                                    <input class="form-control" name="display_ratio[]" id="display_ratio" type="text" pattern="{0-9}:{0-9}" value="{{ old('display_ratio.' . $i, isset($server->ServerDisplay[$i]) ? $server->ServerDisplay[$i]->display_ratio : null) }}"">
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
                        <h4>ข้อมูลด้าน Software</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-lg-6"> <!--OS-->
                                <div class="form-group">
                                    <label for="os" class="form-label">OS</label>
                                    <select class="form-select @error('os_id') is-invalid @enderror" name="os_id" id="os">
                                        <option value="" hidden></option>
                                        @foreach($server_oses as $server_os)
                                            <option value="{{ $server_os['id'] }}" {{ old('os_id',$server->os_id) == $server_os['id'] ? 'selected' : '' }}>{{ $server_os['name'] }}</option>
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
                                    <div class="form-check-inline">
                                        @foreach ($os_arches as $os_arch)
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="os_arch_id" id="os_arch" value="{{ $os_arch['id'] }}" {{ old('os_arch_id',$server->os_arch_id) == $os_arch['id'] ? 'checked' : '' }}><label for="os_arch"> {{ $os_arch['name'] }}</label>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6"><!--กลุ่มของบทบาท-->
                                <div class="form-group">
                                    <label for="role_class" class="form-label">กลุ่มของบทบาท</label>
                                    <select class="form-select @error('role_class_id') is-invalid @enderror " name="role_class_id" id="role_class">
                                        <option value="" hidden selected></option>
                                        @foreach($server_role_classes as $server_role_class)
                                            <option value="{{ $server_role_class['id'] }}" {{ old('role_class_id',$server->role_class_id) == $server_role_class['id'] ? 'selected' : '' }}>{{ $server_role_class['name'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('role_class_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6"><!--บทบาท-->
                                <div class="form-group">
                                    <label for="role_subclass" class="form-label">บทบาท</label><br>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="is_ad" id="is_ad" value="1" {{ old('is_ad',$server->is_ad) == 1 ? 'checked' : '' }}><label for="is_ad">Active Directory</label><br>
                                        <input type="checkbox" class="form-check-input" name="is_dns" id="is_dns" value="1" {{ old('is_dns',$server->is_dns) == 1 ? 'checked' : '' }}><label for="is_dns">DNS</label><br>
                                        <input type="checkbox" class="form-check-input" name="is_dhcp" id="is_dhcp" value="1" {{ old('is_dhcp',$server->is_dhcp) == 1 ? 'checked' : '' }}><label for="is_dhcp">DHCP</label><br>
                                        <input type="checkbox" class="form-check-input" name="is_fileshare" id="is_fileshare" value="1" {{ old('is_fileshare',$server->is_fileshare) == 1 ? 'checked' : '' }}><label for="is_fileshare">File Server</label><br>
                                        <input type="checkbox" class="form-check-input" name="is_web" id="is_web" value="1" {{ old('is_web',$server->is_web) == 1 ? 'checked' : '' }}><label for="is_web">Web Server</label><br>
                                        <input type="checkbox" class="form-check-input" name="is_db" id="is_db" value="1" {{ old('is_db',$server->is_db) == 1 ? 'checked' : '' }}><label for="is_db">Database Server</label><br>
                                        <input type="checkbox" class="form-check-input" name="is_log" id="is_log" value="1" {{ old('is_log',$server->is_log) == 1 ? 'checked' : '' }}><label for="is_log">Logging Server</label><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6"> <!--other software-->
                                <div class="form-group">
                                    <label for="other_software" class="form-label">Software อื่นๆ</label><br>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="other_software" id="other_software" value="1" {{ old('other_software',$server->other_software) == 1 ? 'checked' : ''}}><label for="other_software">มี Software อื่นๆ</label>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6"> <!--other software details-->
                                <div class="form-group">
                                    <label for="other_software_detail" class="form-label">โปรดกรอกรายชื่อ Software</label>
                                    <textarea class="form-control @error('other_software_detail') is-invalid @enderror" name="other_software_detail" id="other_software_detail" rows="2">{{ old('other_software_detail',$server->other_software_detail) }}</textarea>
                                    @error('other_software_detail')
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
                        <h4>ข้อมูลด้านเครือข่าย</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-lg-6"> <!--lan type-->
                                <div class="form-group">
                                    <label for="lan_type" class="form-label">ประเภทเครือข่าย</label><br>
                                    <select class="form-select @error('lan_type_id') is-invalid @enderror" name="lan_type_id" id="lan_type">
                                        <option value="" hidden></option>
                                        @foreach($network_connections as $network_connection)
                                            <option value="{{ $network_connection['id'] }}" {{ old('lan_type_id',$server->lan_type_id) == $network_connection['id'] ? 'selected' : '' }}>{{ $network_connection['name'] }}</option>
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
                                    <input class="form-control" name="lan_outlet_no" id="lan_outlet_no" type="text" value="{{ old('lan_outlet_no',$server->lan_outlet_no) }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6"> <!--ip address-->
                                <div class="form-group">
                                    <label for="ip_address" class="form-label">IP Address</label>
                                    <input class="form-control @error('ip_address') is-invalid @enderror" name="ip_address" id="ip_address" type="text" placeholder="127.0.0.1" value="{{ old('ip_address',$server->ip_address) }}">
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
                                    <input class="form-control @error('mac_address') is-invalid @enderror" name="mac_address" id="mac_address" type="text" placeholder="12-34-56-78-90-AB" value="{{ old('mac_address',$server->mac_address) }}">
                                    @error('mac_address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col sm-12 col-lg-6"><!--computer name-->
                                <div class="form-group">
                                    <label for="computer_name" class="form-label">Computer Name</label>
                                    <input class="form-control" name="computer_name" id="computer_name" type="text" value="{{ old('computer_name',$server->computer_name) }}">
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
                            <div class="col-sm-12 col-lg-6"><!--หมายเหตุ-->
                                <div class="form-group">
                                    <label for="remarks" class="form-label">หมายเหตุ</label><br>
                                    <textarea class="form-control" name="remarks" id="remarks" rows="2">{{ old('remarks',$server->remarks) }}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6"> <!--issues-->
                                <div class="form-group">
                                    <label for="issues" class="form-label">ปัญหาในการใช้งาน</label>
                                    <textarea class="form-control" name="issues" id="issues" rows="2">{{ old('issues',$server->issues) }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-lg btn-success">บันทึกข้อมูล</button>
                    <button type="reset" class="btn btn-lg btn-danger">ยกเลิกการแก้ไข</button>
                </div>
            </form>
        </div>
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
    function displayCountSelected(select) {
        let displayCount = select.options[select.selectedIndex].value;
        document.getElementById("server_form").action = `{{ url('/server/' . $server->id . '/update/?displayCount=${displayCount}')}}`;
        document.getElementById("server_form").submit();
    }

</script>
@endsection