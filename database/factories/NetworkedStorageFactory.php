<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\NetworkedStorage;
use Faker\Generator as Faker;

//กำหนคค่าจำลองต่างๆในตาราง NetworkedStorage
$factory->define(NetworkedStorage::class, function (Faker $faker) {
    return [
        'sapid',//สุ่มรหัส sap
        'pid',//รหัสครุภัณฑ์
        'location_id', //ที่ตั้ง
        'mobility_id', //เคลือนที่ได้
        'section_id', //หน่วยงาน
        'tel_no', //หมายเลขโทรศัพท์
        'response_person', //ผู้รับผิดชอบ
        'owner_id', //ที่มา
        'asset_status_id', //สถานะครุภัณฑ์
        'asset_use_status_id', //สถานะการใช้งาน
        'storage_type_id', //ชนิด
        'brand', //ยี่ห้อ
        'model',//รุ่น
        'serial_no', //หมายเลขประจำเครื่อง
        'data_unit_id', //หน่วยวัดข้อมุล
        'hdd_total_cap', //ความจุข้อมูลรวม
        'no_of_physical_drive_max', //จำนวน HDDสุงสุด
        'no_of_physical_drive_populated', //จำนวน HDD ที่มีอยู่
        'lun_count', //จำนวน Disk จำลอง
        'device_name', //ชื่อเครื่อง
        'device_management_address', //IP address ที่ใช้ควบคุมเครื่อง
        'device_communication_address', //IP address ที่ใช้รับส่งข้อมูล 
        'is_smb', //ใช้ protocol SMB
        'is_fc', //ใช้ protocol FC
        'is_iscsi', //ใช้ protocol iSCSI
        'remarks', //หมายเหตุ
        'issues', //ปัญหาในการใช้งานจำลอง
    ];
});
