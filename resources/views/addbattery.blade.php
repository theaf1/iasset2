@extends('Layouts.app')
@section('name')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4></h4>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection