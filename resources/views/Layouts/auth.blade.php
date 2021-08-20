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
      </nav>
    @yield('content')
</body>
<script src="{{ url('/js/jquery.min.js') }}"></script>
<script src="{{ url('/js/bootstrap.js') }}"></script>
<script src="{{ url('/js/axios.min.js') }}"></script>
@yield('js')
</html>