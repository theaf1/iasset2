<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Peripherals;
use Faker\Generator as Faker;

//กำหนดค่าจำลองต่างๆในตาราง Peripherals
$factory->define(Peripherals::class, function (Faker $faker) {
    return [
        'type_id'=> rand(1,5), //สุ่มค่า type_id
        'sapid' => rand(131100000000,131100099999) , //สุ่มรหัส SAP
        'pid' => '11060000-I-7440-001-0001/62', //รหัสครุภัณฑ์
        'location_id' => rand(1,124), //ที่ตั้ง
        'mobility_id' => 1, //เคลื่อนที่ได้
        'multi_user_id' => 1, //ใช้งานหลายคน
        'user' => $faker->firstName(), //ผู้ใช้งาน
        'position_id' => rand(1,3), //ตำแหน่ง
        'section_id' => rand(1,25), //หน่วยงาน
        'tel_no' => '9-9999#99', //หมายเลขโทรศัพท์
        'owner_id' => 1, //ที่มา
        'asset_status_id' => 3, //สถานะครุภัณฑ์
        'asset_use_status_id' => 2, //สถานะการใช้งาน
        'remarks' => 'FAKE DATA NOT FOR PRODUCTION', //หมายเหตุ
        'brand' => 'BRAND', //ยี่ห้อ
        'model' => 'MODEL', //รุ่น
        'serial_no' => $faker->bothify('test-####'),//หมายเลขประจำเครื่อง
        'supply_consumables_id' => 1, //วัสดุสึกหรอสิ้นเปลือง
        'connectivity_id' => 1, //การเชื่อมต่อ
        'ip_address'=> $faker->localIpv4, //IP Address
        'lan_outlet_no' => 'UX-XXXX', //จุด LAN
        'is_shared' => $faker->boolean, //ใช้งานร่วมกัน
        'share_name' => 'device', //ชื่ออ้างอิง
        'share_method' => 2, //วิธีการ Share
        'issues' => 'test', //ปัญหาจำลอง
    ];
});
