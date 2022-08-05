<html>
    
    <head>
        <meta http-equiv="Content-Type" content="text/html;"charset=utf-8/>
        <title>ระบบติดตามครุภัณฑ์คอมพิวเตอร์ - @yield('title')</title>
        <link rel="stylesheet" href="{{ url('/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ url('/css/bootstrap.min.css') }}">
    </head>
    <style>
        @font-face
        {
            font-family: 'THSarabun';
            font-style: normal;
            font-weight: normal;
            src: url("{public_path('/fonts/THSarabun.ttf')}}") format('truetype');
        }
        @font-face
        {
            font-family: 'THSarabun';
            font-style: normal;
            font-weight: bold;
            src: url("{{asset('/fonts/THSarabun Bold.ttf')}}") format('truetype');
        }
        @font-face
        {
            font-family: 'THSarabun';
            font-style: italic;
            font-weight: normal;
            src: url("{{asset('/fonts/THSarabun Italic.ttf')}}") format('truetype');
        }
        @font-face
        {
            font-family: 'THSarabun';
            font-style: italic;
            font-weight: bold;
            src: url("{public_path('/fonts/THSarabun BoldItalic.ttf')}}") format('truetype');
        }
    </style>
    <body>
        @section('header')
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color:808080;">
                <div class="container-fluid">
                    <p class="navbar-brand text-white">ระบบติดตามครุภัณฑ์คอมพิวเตอร์</p>
                </div>
            </nav>
        @yield('content')
    </body>
</html>