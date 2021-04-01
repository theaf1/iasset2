@extends('Layouts.app')
@section('content')
    <div class="container-fluid">
        <table class="table table-hover table-responsive mt-4">
            <thead>
                <tr>
                    <th scope="col">รายการ</th>
                    <th scope="col">จำนวน (เครื่อง)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>เครื่องคอมพิวเตอร์</td><td class="text-center">{{$client}}</td>
                </tr>
                <tr>
                    <td>อุปกรณ์ต่อพ่วง</td><td class="text-center">{{$peripherals}}</td>
                </tr>
                <tr>
                    <td>อุปกรณ์ต่อพ่วงเก็บข้อมูล</td><td class="text-center">{{$storageperipheral}}</td>
                </tr>
                <tr>
                    <td>เครื่องคอมพิวเตอร์แม่ข่าย</td><td class="text-center">{{$servers}}</td>
                </tr>
                <tr>
                    <td>อุปกรณ์เครือข่าย</td><td class="text-center">{{$networkdevices}}</td>
                </tr>
                <tr>
                    <td>อุปกรณ์เก็บข้อมูลเครือข่าย</td><td class="text-center">{{$networkedstorage}}</td>
                </tr>
                <tr>
                    <td>เครื่องสำรองไฟฟ้า</td><td class="text-center">{{$upses}}</td>
                </tr>
            </tbody>
        </table>
        <p class="text-center">ออกรายงาน ณ วันที่ {{$now}}</p>
    </div>
@endsection