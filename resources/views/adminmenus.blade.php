@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            <div class="card-deck">
                <div class="card mt-4 mr-2">
                    <div class="card-header card-background text-white">
                        <h4 class="text-center">จัดการข้อมูลส่วนกลาง</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-lg-6">
                                <a href="{{url('/admin/sectionadmin')}}" class="btn btn-info btn-block mt-4" role="button">จัดการข้อมูลหน่วยงาน</a>
                                <a href="{{url('/admin/locationadmin')}}" class="btn btn-info btn-block mt-4" role="button">จัดการสถานที่ตั้ง</a>
                                <a href="{{url('/admin/buildingadmin')}}" class="btn btn-info btn-block mt-4" role="button">จัดการรายชื่ออาคาร</a>
                                <a href="{{url('/admin/owneradmin')}}" class="btn btn-info btn-block mt-4" role="button">จัดการรายชื่อเจ้าของเครื่อง</a>
                                <a href="{{url('/admin/positionadmin')}}" class="btn btn-info block mt-4" role="button">จัดการรายชื่อตำแหน่งบุคลากร</a>
                                <a href="{{url('/admin/assetstatusadmin')}}" class="btn btn-info btn-block mt-4" role="button">จัดการรายชื่อสถานะครุภัณฑ์</a>
                                <a href="{{url('/admin/assetusestatusadmin')}}" class="btn btn-info btn-block mt-4" role="button">จัดการรายชื่อสถานะการใช้งานครุภัณฑ์</a>
                                
                                
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <a href="{{url('/admin/clienttypeadmin')}}" class="btn btn-info btn-block mt-4" role="button">จัดการชนิดของครุภัณฑ์คอมพิวเตอร์</a>
                                <a href="{{url('/admin/clientopadmin')}}" class="btn btn-info btn-block mt-4" role="button">จัดการระบบปฏิบัติการของคอมพิวเตอร์</a>
                                <a href="{{url('/admin/networkconnectionadmin')}}" class="btn btn-info btn-block mt-4" role="button">จัดการประเภทเครือข่าย</a>
                                <a href="{{url('/admin/peripheraltypeadmin')}}" class="btn btn-info btn-block mt-4" role="button">จัดการชนิดของอุปกรณ์ต่อพ่วง</a>
                                <a href="{{url('/admin/netsubtypeadmin')}}" class="btn btn-info btn-block mt-4" role="button">จัดการประเภทของอุปกรณ์เครือข่าย</a>
                                <a href="{{url('/admin/serverroleclassadmin')}}" class="btn btn-info btn-block mt-4" role="button">จัดการรายชื่อบทบาท Server</a>
                                <a href="{{url('/serveropadmin')}}" class="btn btn-info btn-block mt-4" role="button">จัดการรายชื่อระบบปฏิบัติการแม่ข่าย</a>
                                <a href="{{url('/batterytypeadmin')}}" class="btn btn-info btn-block mt-4" role="button">จัดการประเภทของแบตเตอรี่ UPS</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-4 mr-2">
                    <div class="card-header card-background text-white">
                        <h4 class="text-center">จัดการผู้ใช้งาน</h4>
                    </div>
                    <div class="card-body">
                        <p>กำลังพัฒนา</p>
                    </div>
                </div>
                <div class="card mt-4 mr-2">
                    <div class="card-header card-background text-white">
                        <h4 class="text-center">การบริหารจัดการเรื่องอื่นๆ</h4>
                    </div>
                    <div class="card-body">
                        <p>กำลังพัฒนา</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection