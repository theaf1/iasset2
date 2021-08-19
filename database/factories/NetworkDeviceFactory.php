<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Asset_statuses;
use App\Models\Asset_use_statuses;
use App\Models\Section;
use App\Models\NetSubtype;
use App\Models\Owner;
use App\Models\Mobility;
use App\Models\Networkdevices;
use Faker\Generator as Faker;

//กำหนดค่าจำลองต่างๆในตาราง Networkdevices
$factory->define(Networkdevices::class, function (Faker $faker) {
    return [
        'sapid' => rand(131100000000,131100099999), //สุ่มรหัส SAP
        'pid' => '1224H001-S-7440-001-0001/64', //รหัสครุภัณฑ์
        'location_id' => 44, //ที่ตั้ง 
        'mobility_id' => 2, //เคลื่อนที่ได้
        'section_id' => 1, //หน่วยงาน
        'tel_no'=>'9-7043#107', //หมายเลขโทรศัพท์
        'response_person' => 'PP', //ผู้รับผิดชอบ
        'owner_id' => 1, //ที่มา
        'asset_status_id' => 3, //สถานะครุภัณฑ์
        'asset_use_status_id' => 2, //สถานะการใช้งาน
        'device_subtype_id' => 2, //ชนิดอุปกรณ์
        'brand' => 'Brand', //ยี่ห้อ
        'model' => 'Model', //รุ่น
        'serial_no' => 'test', //หมายเลขประจำเครื่อง
        'port_count'=> rand(1,48), //สุ่มจำนวน port
        'is_modular' => 0, //ขยายขนาดได้
        'psu_count' => 1, //จำนวน power supply
        'device_management_address' => $faker->localIpv4, //สุ่ม IP address ที่ใช้ควบคุมเครื่อง
        'software_version' => '1A', //รุ่น software ในเครื่อง
        'issues' => 'test', //ปัญหาจำลอง
        'remarks' => 'Fake Data NOT FOR PRODUCTION', //หมายเหตุ
    ];
});
