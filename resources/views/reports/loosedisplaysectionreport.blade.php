@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            @foreach ($loosedisplays as $loosedisplay)
                <div class="card mt-4">
                    <div class="card-header card-background text-white">
                        <h4>ข้อมูลจอภาพที่ไม่ได้ต่อกับคอมพิวเตอร์หมายเลข {{$loosedisplay['id']}}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-lg-6">
                                <p>รหัส SAP: {{$loosedisplay['sapid']}}</p>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <p>รหัสครุภัณฑ์: {{$loosedisplay['pid']}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6">
                                <p>ที่มา: {{$loosedisplay->LooseDisplayOwner->name}}</p>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <p>สถานที่ตั้ง: {{$loosedisplay->LooseDisplayRoom->name}} ชั้น {{$loosedisplay->LooseDisplayRoom->location->floor}} ตึก {{$loosedisplay->LooseDisplayRoom->location->building->name}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6">
                                <p>หน่วยงาน: {{$loosedisplay->LooseDisplaySection->name}}</p>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <p>ผู้รับผิดชอบ: {{$loosedisplay['response_person']}} ตำแหน่ง: {{$loosedisplay->LooseDisplayPosition->name}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6">
                                <p>หมายเลขโทรศัพท์: {{$loosedisplay['tel_no']}}</p>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <p>ครุภัณฑ์{{$loosedisplay->LooseDisplayAssetStatus->name}}</p>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <p>มีสถานะ{{$loosedisplay->LooseDisplayAssetUseStatus->name}}</p>
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
                            <div class="col-sm-12 col-lg-6">
                                <p>ยี่ห้อ: {{$loosedisplay['brand']}} รุ่น: {{$loosedisplay['model']}}</p>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <p>Serial Number: {{$loosedisplay['serial_no']}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6">
                                <p>จอภาพชนิด {{$loosedisplay->LooseDisplayType->name}} ขนาด {{$loosedisplay['display_size']}} นิ้วมีสัดส่วนภาพ {{$loosedisplay->LooseDisplayRatio->name}}</p>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <p>รองรับสัญญาณภาพ {{$loosedisplay['is_vga'] == 1 ? 'VGA' : ''}} {{$loosedisplay['is_dvi'] == 1 ? 'DVI' : ''}} {{$loosedisplay['is_hdmi'] == 1 ? 'HDMI' : ''}} {{$loosedisplay['is_dp'] == 1 ? 'DisplayPort' : ''}}</p>
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
                                <p>หมายเหตุ</p><br>
                                <p>{{$loosedisplay['remarks']}}</p>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <p>ปัญหาในการใช้งาน</p><br>
                                <p>{{$loosedisplay['issues']}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="text-center mt-4">
                <p>ออกรายงานเมื่อวันที่ {{$now}}</p>
            </div>
        </div>
    </div>    
@endsection