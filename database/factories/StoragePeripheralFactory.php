<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Storageperipherals;
use Faker\Generator as Faker;

$factory->define(Storageperipherals::class, function (Faker $faker) {
    return [
        'sapid' => '', //รหัส sap
        'pid' => '', //รหัสครุภัณฑ์
        'location_id' => 37, //ที่ตั้ง
        'mobility_id' => 2, //เครื่องเคลื่อนที่
        'section_id' => 1, //หน่วยงาน
        'multi_user_id' => 2, //ใช้งานกี่คน
        'user' => $faker->name, //สุ่มชื่อผู้ใช้งาน
        'position_id' => 3, //ตำแหน่ง
        'tel_no' => '9-7043#108', //หมายเลขโทรศัพท์
        'owner_id' => 2, //ที่มา
        'asset_status_id' => 2, //สถานะครุภัณฑ์
        'asset_use_status_id' => 2, //สถานะการใช้งาน
        'remarks' => 'Fake data not for production', //หมายเหตุ
        'brand' => 'brand', //ยี่ห้อ
        'model'=> 'Model', //รุ่น
        'serial_no'=> 'test', //หมายเลขประจำเครื่อง
        'connectivity'=> 1, //วิธีเชื่อมต่อ
        'is_hotswap' => 0, //เป็นอุปกรณ์ hotswap
        'data_unit_id' => 2, //หน่วยวัดขนาดข้อมูล
        'total_capacity' => 4, //ความจุข้อมูลรวม
        'no_of_physical_drive_max' => 1, //จำนวน HDD สูงสุด
        'no_of_physical_drive_populated' => 1, //จำนวน HDD ที่มีอยู่
        'lun_count' => 1, //จำนวน Disk จำลอง
        'issues' => 'test', //ปัญหาจำลอง
    ];
});
