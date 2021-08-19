<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Servers;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

$factory->define(Servers::class, function (Faker $faker) {
    return [
        'sapid' => rand(131100000000,131100099999), //สุ่มรหัส SAP
        'pid' => '12240001-D-7440-001-0001/64', //รหัสครุภัณฑ์
        'location_id' => 44, //ที่ตั้ง
        'section_id' => 1, //หน่วยงาน
        'mobility_id' => 2, //เคลื่อนที่ได้
        'tel_no' => '9-7043#108', //หมายเลขโทรศัพท์
        'response_person' => $faker->firstNameFemale, //ชื่อผู้รับผิดชอบ
        'owner_id' => 1, //ที่มา
        'asset_status_id' => 3, //สถานะครุภัณฑ์
        'asset_use_status_id' => 2, //สถานะการใช้งาน
        'brand' => 'Brand', //ยี่ห้อ
        'model' => 'Model', //รุ่น
        'serial_no' => 'test', //หมายเลขประจำเครื่่อง
        'form_factor_id' => 2, //ลักษณะตัวเครื่อง
        'cpu_model' => 'Xeon E5-2215', //รุ่น CPU
        'cpu_speed' => 2.5, //ความเร็ว CPU
        'cpu_socket_no' => 2, //จำนวน socket CPU
        'ram_size' => 64, // ความจุ RAM
        'is_raid' => 1, //RAID
        'no_of_physical_drive_max' => 8, //จำนวน HDD สูงสุด
        'no_of_physical_drive_populated'=> 5, //จำนวน HDD ที่มีอยู่
        'data_unit_id'=>2, //หน่วยวัดข้อมูล
        'hdd_total_cap'=> 6, //ความจุ HDD ทั้งหมด
        'os_id' => 6, //ระบบปฏิบัติการ
        'os_arch_id' => 2, //โครงสร้างภายใน
        'role_class_id' => 2, //กลุ่มของบทบาท
        'is_ad' => 0, //เป็น AD
        'is_dns' => 0, //เป็น DNS
        'is_dhcp'=> 0, //เป็น DHCP
        'is_fileshare' =>0, //เป็น file server
        'is_web' => 1, //เป็น Web server
        'is_db' => 1, //เป็น Database server
        'is_log' => 0, //เป็น Logging Server
        'other_software' => 0, //software อื่นๆ
        'other_software_detail' => null, //รายละเอืยด software อื่นๆ 
        'lan_type_id' => 5, //ลักษณะเครือข่าย
        'lan_outlet_no' => 'U8-8888', //LAN Outlet
        'ip_address' => $faker->localIpv4, //สุ่ม IP address
        'mac_address' => $faker->macAddress, //สุ่ม MAC address
        'computer_name' => $faker->numerify('SIMEDSRV##'), //สุมชื่่อเครื่อง
        'issues' => 'test', //ปัญหาจำลอง
        'remarks' => 'FAKE DATA Not for production', //หมายเหตุ
    ];
});
