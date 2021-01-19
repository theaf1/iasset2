<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\NetworkedStorage;
use Faker\Generator as Faker;

//กำหนคค่าจำลองต่างๆในตาราง NetworkedStorage
$factory->define(NetworkedStorage::class, function (Faker $faker) {
    return [
        'sapid' => rand(131100000000,131100099999),//สุ่มรหัส sap
        'pid' => '1224H001-S-7440-001-0001/64',//รหัสครุภัณฑ์
        'location_id'=> 44, //ที่ตั้ง
        'mobility_id'=> 2, //เคลือนที่ได้
        'section_id' => 1, //หน่วยงาน
        'tel_no'=> '9-7043#108', //หมายเลขโทรศัพท์
        'response_person' => 'PP', //ผู้รับผิดชอบ
        'owner_id' => 1, //ที่มา
        'asset_status_id' => 3 , //สถานะครุภัณฑ์
        'asset_use_status_id' => 2, //สถานะการใช้งาน
        'storage_type_id' => 1, //ชนิด
        'brand' => 'Brand', //ยี่ห้อ
        'model' => 'Model',//รุ่น
        'serial_no' => 'test', //หมายเลขประจำเครื่อง
        'data_unit_id' => 2, //หน่วยวัดข้อมุล
        'hdd_total_cap' => 32, //ความจุข้อมูลรวม
        'no_of_physical_drive_max' => 16, //จำนวน HDDสุงสุด
        'no_of_physical_drive_populated' => 8, //จำนวน HDD ที่มีอยู่
        'lun_count' => 2, //จำนวน Disk จำลอง
        'device_name' => 'SILO-MED', //ชื่อเครื่อง
        'device_management_address' => $faker->localIpv4, //IP address ที่ใช้ควบคุมเครื่อง
        'device_communication_address' => $faker->localIpv4, //IP address ที่ใช้รับส่งข้อมูล 
        'is_smb' => 1, //ใช้ protocol SMB
        'is_fc' => 0, //ใช้ protocol FC
        'is_iscsi' => 0, //ใช้ protocol iSCSI
        'remarks' => 'FAKE DATA not for production', //หมายเหตุ
        'issues' => 'test', //ปัญหาในการใช้งานจำลอง
    ];
});
