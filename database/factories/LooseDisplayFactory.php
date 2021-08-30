<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\LooseDisplay;
use Faker\Generator as Faker;

$factory->define(LooseDisplay::class, function (Faker $faker) {

    return [
        'sapid' => rand(131100000000,131100099999), //จำลองรหัส SAP
        'pid' => '1224H001-7440-001-0001/64', //จำลองรหัสครุภัณฑ์
        'owner_id'=> 2, //เจ้าของเครื่อง
        'location_id' => 8, //สถานที่ตั้ง
        'section_id' => 1, //หน่วยงาน
        'response_person' => $faker->name, //ผู้รับผิดชอบ
        'position_id' => 3, //ตำแหน่ง
        'tel_no' => '9-7767#108', //หมายเลขโทรศัพท์
        'asset_status_id' => 3, //สถานะทางทะเบียนครุภัณฑ์
        'asset_use_status_id' => 2, //สถานะการใช้งานครุภัณฑ์
        'brand' => 'brand', //ยี่ห้อ
        'model' => 'model', //รุ่น
        'serial_no' => $faker->bothify('test-####'), //เลขประจำเครื่อง
        'display_type_id' => 2, //ชนิดจอภาพ
        'display_size'=> 27, //ขนาดจอภาพ
        'display_ratio_id' =>3, //สัดส่วนจอภาพ
        'is_vga' => $faker->boolean, //มี port VGA
        'is_dvi'=> $faker->boolean, //มี port DVI
        'is_hdmi' => $faker->boolean, //มี port HDMI
        'is_dp' => $faker->boolean, //มี port DisplayPort
        'issues'=>'test', //ปัญหาจำลอง
        'remarks'=> 'FAKE DATA NOT FOR PRODUCTION', //หมายเหตุจำลอง
    ];
});