<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\location;
use App\Mobility;
use App\Section;
use App\Owner;
use App\Asset_statuses;
use App\Asset_use_statuses;
use App\Upses;
use Faker\Generator as Faker;

$factory->define(Upses::class, function (Faker $faker) {
    return [
        'sapid' => rand(131100000000,131100099999), //สุ่มรหัส SAP จำลอง
        'pid' => '11000800-I-7440-001-0001/55', //กำหนดค่ารหัสครุภัณฑ์
        'location_id' => 8, //กำหนดที่ตั้ง
        'mobility_id' => 1, //เป็นเครื่องเคลื่อนที่
        'response_person' => 'PP', //ชื่อผู้รับผิดชอบ
        'section_id' => 1, //หน่วยงาน
        'tel_no'=>'9-7043#108', //หมายเลขโทรศัพท์
        'owner_id'=> 2, //ที่มา
        'asset_status_id'=> 3, //สถานะครุภัณฑ์
        'asset_use_status_id'=> 1, //สถานะการใช้งาน
        'brand'=>'brand', //ยี่ห้อ
        'model'=>'model', //รุ่น
        'serial_no'=>'test', //หมายเลขประจำเครื่อง
        'form_factor_id'=> 2, //ลักษณะเครื่อง
        'topology_id' => 2, //หลักการทำงาน
        'capacity' => 1, //กำลังไฟฟ้า
        'is_modular' => 0, //
        'battery_type_id'=> 1, //ชนิดของ Battery
        'has_external_battery' => 0, //มี battery ภายนอก
        'device_management_address' => $faker->localIpv4, //สุ่ม IP address ที่ใช้ควบคุมเครื่อง
        'issues' => 'test', //ปัญหาในการใช้งานจำลอง
        'remarks' => 'Fake Data NOT FOR PRODUCTION', //หมายเหตุ
    ];
});
