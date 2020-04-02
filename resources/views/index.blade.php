@extends('Layouts.app')
@section('header')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="col-12 mx-auto">
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>กรุณาเลือกหน่วยงาน</h4>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 col-lg-6">
                        <div class="form-group">
                            <label for="section">หน่วยงาน</label>
                            <select class="form-control" id="section">
                                <option value="" hidden></option>
                                @foreach ($sections as $section)
                                    <option value="{{ $section['id'] }}">{{ $section['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>คอมพิวเตอร์</h4>
                </div>
                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th scope="col">ลำดับที่</th>
                            <th scope="col">ชนิด</th>
                            <th scope="col">SAP</th>
                            <th scope="col">รหัสครุภัณฑ์</th>
                            <th scope="col">mobile</th>
                            <th scope="col">สถานะทางทะเบียนครุภัณฑ์</th>
                            <th scope="col">สถานะการใช้งานครุภัณฑ์</th>
                            <th scope="col">a</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>PC</td>
                            <td>13110001234</td>
                            <td>11060000-I-7440-001-0001/48</td>
                            <td>NO</td>
                            <td>รอการทดแทน</td>
                            <td>ใช้งาน</td>
                            <td><button class="btn btn-sm btn-info">แก้ไข</button></td>
                            
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>อุปกรณ์ต่อพ่วง</h4>
                </div>
                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th scope="col">ลำดับที่</th>
                            <th scope="col">ชนิด</th>
                            <th scope="col">SAP</th>
                            <th scope="col">รหัสครุภัณฑ์</th>
                            <th scope="col">mobile</th>
                            <th scope="col">สถานะทางทะเบียนครุภัณฑ์</th>
                            <th scope="col">สถานะการใช้งานครุภัณฑ์</th>
                            <th scope="col">a</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Printer</td>
                            <td>CO15633-0999</td>
                            <td>N/A</td>
                            <td>NO</td>
                            <td>มีรหัสทรัพย์สินแล้ว</td>
                            <td>ใช้งาน</td>
                            <td><button class="btn btn-sm btn-info">แก้ไข</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>อุปกรณ์ต่อพ่วงเก็บข้อมูล</h4>
                </div>
                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th scope="col">ลำดับที่</th>
                            <th scope="col">SAP</th>
                            <th scope="col">รหัสครุภัณฑ์</th>
                            <th scope="col">mobile</th>
                            <th scope="col">สถานะทางทะเบียนครุภัณฑ์</th>
                            <th scope="col">สถานะการใช้งานครุภัณฑ์</th>
                            <th scope="col">a</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>N/A</td>
                            <td>N/A</td>
                            <td>NO</td>
                            <td>ไม่จำเป็น/ไม่สามารถขึ้นทะเบียนได้</td>
                            <td>ใช้งาน</td>
                            <td><button class="btn btn-sm btn-info">แก้ไข</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>คอมพิวเตอร์แม่ข่าย</h4>
                </div>
                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th scope="col">ลำดับที่</th>
                            <th scope="col">SAP</th>
                            <th scope="col">รหัสครุภัณฑ์</th>
                            <th scope="col">mobile</th>
                            <th scope="col">สถานะทางทะเบียนครุภัณฑ์</th>
                            <th scope="col">สถานะการใช้งานครุภัณฑ์</th>
                            <th scope="col">a</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>13110001238</td>
                            <td>11060000-I-7440-001-0001/48</td>
                            <td>NO</td>
                            <td>รอการทดแทน</td>
                            <td>ไม่ใช้งาน</td>
                            <td><button class="btn btn-sm btn-info">แก้ไข</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>อุปกรณ์เครือข่าย</h4>
                </div>
                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th scope="col">ลำดับที่</th>
                            <th scope="col">ชนิด</th>
                            <th scope="col">SAP</th>
                            <th scope="col">รหัสครุภัณฑ์</th>
                            <th scope="col">mobile</th>
                            <th scope="col">สถานะทางทะเบียนครุภัณฑ์</th>
                            <th scope="col">สถานะการใช้งานครุภัณฑ์</th>
                            <th scope="col">a</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>HUB</td>
                            <td>N/A</td>
                            <td>N/A</td>
                            <td>NO</td>
                            <td>รอการทดแทน</td>
                            <td>ใช้งาน</td>
                            <td><button class="btn btn-sm btn-info">แก้ไข</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>อุปกรณ์เก็บข้อมูลเครือข่าย</h4>
                </div>
                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th scope="col">ลำดับที่</th>
                            <th scope="col">ชนิด</th>
                            <th scope="col">SAP</th>
                            <th scope="col">รหัสครุภัณฑ์</th>
                            <th scope="col">mobile</th>
                            <th scope="col">สถานะทางทะเบียนครุภัณฑ์</th>
                            <th scope="col">สถานะการใช้งานครุภัณฑ์</th>
                            <th scope="col">a</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>NAS</td>
                            <td>13110001240</td>
                            <td>12240000-I-7440-001-0001/60</td>
                            <td>NO</td>
                            <td>มีรหัสทรัพย์สินแล้ว</td>
                            <td>ใช้งาน</td>
                            <td><button class="btn btn-sm btn-info">แก้ไข</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card mt-4">
                <div class="card-header card-background text-white">
                    <h4>เครื่องสำรองไฟฟ้า</h4>
                </div>
                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th scope="col">ลำดับที่</th>
                            <th scope="col">SAP</th>
                            <th scope="col">รหัสครุภัณฑ์</th>
                            <th scope="col">mobile</th>
                            <th scope="col">สถานะทางทะเบียนครุภัณฑ์</th>
                            <th scope="col">สถานะการใช้งานครุภัณฑ์</th>
                            <th scope="col">a</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>18060001234</td>
                            <td>1224H0001-I-7440-001-0001/62</td>
                            <td>NO</td>
                            <td>รอการทดแทน</td>
                            <td>ใช้งาน</td>
                            <td><button class="btn btn-sm btn-info">แก้ไข</button></td>
                            
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection 