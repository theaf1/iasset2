@extends('Layouts.app')
@section('content')
    

<div class="container-fluid">
    <div class="col-12 mx-auto">
        <table class="table mt4 table-hover table-responsive">
            <thead>
                <tr>
                    <th scope="col">ลำดับที่</th>
                    <th scope="col">SAP</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($results as $result)
                        <th scope="row">{{ $result['id'] }}</th>
                        <td>{{ $result['sapid'] }}</td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection