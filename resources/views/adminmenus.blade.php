@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            <div class="card-deck">
                <div class="card mt-4 mr-2">
                    <div class="card-header card-background text-white">
                        <p>จัดการข้อมูลส่วนกลาง</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-lg-6">
                                <a href="{{url('/sectionadmin')}}" class="btn btn-info btn-block mt-4" role="button">จัดการข้อมูลหน่วยงาน</a>
                                <a href="#" class="btn btn-info btn-block mt-4" role="button">add section</a>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <a href="#" class="btn btn-info btn-block mt-4" role="button">add section</a>
                                <a href="#" class="btn btn-info btn-block mt-4" role="button">add section</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-4 mr-2">
                    <div class="card-header card-background text-white">
                        <p>2</p>
                    </div>
                    <div class="card-body">
                        <p>blah</p>
                    </div>
                </div>
                <div class="card mt-4 mr-2">
                    <div class="card-header card-background text-white">
                        <p>3</p>
                    </div>
                    <div class="card-body">
                        <p>blah</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection