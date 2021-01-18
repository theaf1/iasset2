<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Display;
use Faker\Generator as Faker;

//กำหนดค่าจำลองต่างๆของตาราง Display
$factory->define(Display::class, function (Faker $faker) {
    return [
        'client_id', //foreign key จาก ตาราง clients
        'display_sapid' => rand(180600000000,180600009999), //สุ่มรหัส SAP
        'display_pid'=> '1224H001-S-7440-006-0002/64', //รหัสครุภัณฑ์
        'display_size' => 19, //ขนาดจอภาพ
        'display_ratio' =>'5:4', //สัดส่วนภาพของจอภาพ
    ];
});
