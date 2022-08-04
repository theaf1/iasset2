@extends('Layouts.app')
@section('content')
    <p>TEST</p>
    @foreach ($data as $name)
        {{$name}}
        <!--test-->
    @endforeach
@endsection