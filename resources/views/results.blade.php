@extends('Layouts.app')
@section('content')
    

<div class="container-fluid">
    <div class="col-12 mx-auto">
        <div class="modal fade" id="alert" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">ข้อความจากระบบ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <p>ไม่พบข้อมูลที่ค้นหา</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">รับทราบ</button>
                    </div>
                </div>
            </div>
        </div>
        <table class="table mt4 table-hover table-responsive">
            <thead>
                <tr>
                    <th scope="col">ลำดับที่</th>
                    <th scope="col">SAP</th>
                    <th scope="col">ชนิด</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($results as $result)
                    <tr>
                        <th scope="row">{{ $result['id'] }}</th>
                        <td>{{ $result['sapid'] }}</td>
                        <td>{{ $result->ClientType->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('js')
    <script>
        @if(count($results)==0)
            $('#alert').modal('show');
        @endif
    </script>
@endsection