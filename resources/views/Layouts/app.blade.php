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
      <nav class="navbar navbar-expand-lg navbar-light" style="background-color:ffff00;">
      <a class="navbar-brand" href="{{ url('/index') }}">ระบบติดตามครุภัณฑ์คอมพิวเตอร์</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              เมนูหลัก
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ url('/computer') }}">เพิ่มข้อมูลคอมพิวเตอร์</a>
              <a class="dropdown-item" href="{{ url('/peripherals') }}">เพิ่มข้อมูลอุปกรณต่อพ่วง</a>
              <a class="dropdown-item" href="{{ url('/storage') }}">เพิ่มข้อมูลอุปกรณต่อพ่วงเก็บข้อมูล</a>
              <a class="dropdown-item" href="{{ url('/server') }}">เพิ่มข้อมูลคอมพิวเตอร์แม่ข่าย</a>
              <a class="dropdown-item" href="{{ url('/network') }}">เพิ่มข้อมูลอุปกรณเครือข่าย</a>
              <a class="dropdown-item" href="{{ url('/ns') }}">เพิ่มข้อมูลอุปกรณ์เก็บข้อมูลเครือข่าย</a>
              <a class="dropdown-item" href="{{ url('/ups') }}">เพิ่มข้อมูลเครื่องสำรองไฟฟ้า</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ url('/client') }}">สอบทานและแก้ไขข้อมูลคอมพิวเตอร์</a>
              <a class="dropdown-item" href="{{ url('/peripheral') }}">สอบทานและแก้ไขข้อมูลอุปกรณ์ต่อพ่วง</a>
              <a class="dropdown-item" href="{{ url('/storageperipheral') }}">สอบทานและแก้ไขข้อมูลอุปกรณ์ต่อพ่วงเก็บข้อมูล</a>
              <a class="dropdown-item" href="{{ url('/server') }}">สอบทานและแก้ไขข้อมูลคอมพิวเตอร์แม่ข่าย</a>
              <a class="dropdown-item" href="{{ url('/networkdevices') }}">สอบทานและแก้ไขข้อมูลอุปกรณเครือข่ายคอมพิวเตอร์</a>
              <a class="dropdown-item" href="{{ url('/networkedstorage') }}">สอบทานและแก้ไขข้อมูลอุปกรณ์เก็บข้อมูลเครือข่าย</a>
              <a class="dropdown-item" href="{{ url('/ups') }}">สอบทานและแก้ไขข้อมูลเครื่องสำรองไฟฟ้า</a>
            </div>
          </li>
        </ul>
      </div>
      </nav>
    @yield('content')
</body>
<script src="{{ url('/js/jquery.min.js') }}"></script>
<script src="{{ url('/js/bootstrap.js') }}"></script>
@yield('js')
</html>