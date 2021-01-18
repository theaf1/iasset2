<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Peripherals;
use Faker\Generator as Faker;

//กำหนดค่าจำลองต่างๆในตาราง Peripherals
$factory->define(Peripherals::class, function (Faker $faker) {
    return [
        'type_id', //สุ่มค่า type_id
        'sapid', //สุ่มรหัส SAP
        'pid'=>'', //รหัสครุภัณฑ์
        'location_id', //ที่ตั้ง
        'mobility_id', //เคลื่อนที่ได้
        'multi_user_id', //ใช้งานหลายคน
        'user' => $faker->name, //ผู้ใช้งาน
        'position_id', //ตำแหน่ง
        'section_id', //หน่วยงาน
        'tel_no', //หมายเลขโทรศัพท์
        'function',
        'owner_id', //ที่มา
        'asset_status_id', //สถานะครุภัณฑ์
        'asset_use_status_id', //สถานะการใช้งาน
        'remarks' => 'FAKE DATA NOT FOR PRODUCTION', //หมายเหตุ
        'brand', //ยี่ห้อ
        'model', //รุ่น
        'serial_no',//หมายเลขประจำเครื่อง
        'supply_consumables', //วัสดุสึกหรอสิ้นเปลือง
        'connectivity', //การเชื่อมต่อ
        'ip_address', //IP Address
        'lan_outlet_no', //จุด LAN
        'is_shared', //ใช้งานร่วมกัน
        'share_name', //ชื่ออ้างอิง
        'share_method', //วิธีการ Share
        'issues', //ปัญหาจำลอง
    ];
});
