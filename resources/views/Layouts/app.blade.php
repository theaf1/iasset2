<html>
  <head>
    <title>ระบบติดตามครุภัณฑ์คอมพิวเตอร์ - @yield('title')</title>
    <link rel="stylesheet" href="{{ url('/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ url('/css/bootstrap.min.css') }}">
  </head>
  <style>
    .card-background {
        background-color:#6b8e23;
    }
  .autocomplete-suggestions { border: 1px solid #999; background: #FFF; overflow: auto; }
  .autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
  .autocomplete-selected { background: #F0F0F0; }
  .autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }
  .autocomplete-group { padding: 2px 5px; }
  .autocomplete-group strong { display: block; border-bottom: 1px solid #000; }
  </style>
  <body>
    @section('header')
      <nav class="navbar navbar-expand-lg navbar-light" style="background-color:808080;">
        <a class="navbar-brand text-white" href="{{ url('/') }}">ระบบติดตามครุภัณฑ์คอมพิวเตอร์</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            @if (Auth::check())
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               เพิ่มครุภัณฑ์
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ url('/computer') }}">เพิ่มข้อมูลคอมพิวเตอร์</a>
                <a class="dropdown-item" href="{{ url('/peripherals') }}">เพิ่มข้อมูลอุปกรณต่อพ่วง</a>
                <a class="dropdown-item" href="{{ url('/storage') }}">เพิ่มข้อมูลอุปกรณต่อพ่วงเก็บข้อมูล</a>
                <a class="dropdown-item" href="{{ url('/server') }}">เพิ่มข้อมูลคอมพิวเตอร์แม่ข่าย</a>
                <a class="dropdown-item" href="{{ url('/network') }}">เพิ่มข้อมูลอุปกรณเครือข่าย</a>
                <a class="dropdown-item" href="{{ url('/ns') }}">เพิ่มข้อมูลอุปกรณ์เก็บข้อมูลเครือข่าย</a>
                <a class="dropdown-item" href="{{ url('/ups') }}">เพิ่มข้อมูลเครื่องสำรองไฟฟ้า</a>
                <a href="{{url('/addloosedisplay')}}" class="dropdown-item">เพิ่มข้อมูลจอภาพที่ไม่ได้ต่อกับคอมพิวเตอร์</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                แก้ไขข้อมูลครุภัณฑ์
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ url('/client') }}">แก้ไขข้อมูลคอมพิวเตอร์</a>
                <a class="dropdown-item" href="{{ url('/peripheral') }}">แก้ไขข้อมูลอุปกรณ์ต่อพ่วง</a>
                <a class="dropdown-item" href="{{ url('/storageperipheral') }}">แก้ไขข้อมูลอุปกรณ์ต่อพ่วงเก็บข้อมูล</a>
                <a class="dropdown-item" href="{{ url('/servers') }}">แก้ไขข้อมูลคอมพิวเตอร์แม่ข่าย</a>
                <a class="dropdown-item" href="{{ url('/networkdevices') }}">แก้ไขข้อมูลอุปกรณเครือข่ายคอมพิวเตอร์</a>
                <a class="dropdown-item" href="{{ url('/networkedstorage') }}">แก้ไขข้อมูลอุปกรณ์เก็บข้อมูลเครือข่าย</a>
                <a class="dropdown-item" href="{{ url('/upses') }}">แก้ไขข้อมูลเครื่องสำรองไฟฟ้า</a>
                <a class="dropdown-item" href="{{ url('/loosedisplay') }}">แก้ไขข้อมูลจอภาพที่ไม่ได้ต่อกับคอมพิวเตอร์</a>
              </div>
            </li>
            @endif
            @if (Auth::check())
              <li class="nav-item">
                <a href="{{url('/admin')}}" class="nav-link text-white">สำหรับผู้ดูแลระบบ</a>
              </li>
            @endif
          </ul>
          @if (Auth::check())
               <span class="navbar-text text-white pr-2">
                  สวัสดี {{Auth::user()->name}}
               </span> 
          @endif
          @if (Auth::check())
            <form action="{{url('/exit')}}" method="POST" class="d-flex">
              @csrf
              <button type="menu" class="btn btn-sm btn-warning mt-4">ออกจากระบบ</button>
            </form>
          @endif
        </div>
      </nav>
    @yield('content')
</body>
<script src="{{ url('/js/jquery.min.js') }}"></script>
<script src="{{ url('/js/bootstrap.js') }}"></script>
<script src="{{ url('/js/axios.min.js') }}"></script>
@yield('js')
</html>