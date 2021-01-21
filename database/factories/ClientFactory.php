<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use App\Location;
use App\Mobility;
use App\Section;
use App\Position;
use App\Opsfunction;
use App\Owner;
use App\Asset_statuses;
use App\Asset_use_statuses;
use App\DataUnit;
use App\NetworkConnection;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'type_id'=> 1, //สุ่มค่า type_id
        'sapid' => rand(131100000000,131100099999), //สุ่มรหัส SAP
        'pid'=> '11000800-S-7440-001-0001/64', //รหัสครุภัณฑ์
        'location_id'=> rand(1,124), //ที่ตั้ง
        'mobility_id'=> 2, //เคลื่อนที่ได้
        'section_id'=> rand(1,25), //หน่วยงาน
        'multi_user_id' => 1,
        'user'=> $faker->name, //ผู้ใช้
        'position_id'=> 3, //ตำแหน่ง
        'function_id'=> 1, //ระบบงาน
        'owner_id'=>1, //ที่มา
        'tel_no' => '9-9999', //หมายเลขโทรศัพท์
        'permission' => 0,//อำนาจ admin
        'asset_status_id'=> 3,//สถานะครุภัณฑ์
        'asset_use_status_id'=> 2,//สถานะการใช้งาน
        'remarks'=> 'TEST DATA NOT FOR PRODUCTION',//หมายเหตุ
        'brand'=> 'FELL', //ยี่ห้อ
        'model'=> 'Not-so-bright1', //รุ่น
        'serial_no'=>'test', //หมายเลขประจำเครื่อง
        'cpu_model' => 'Core i5-1025G7', //รุ่น CPU
        'cpu_speed' => 2.5, //ความเร็ว CPU
        'cpu_socket_number'=> 1, //จำนวน socket cpu
        'ram_size'=> 8, //จำนวน RAM
        'hdd_no' => 1, //จำนวน HDD
        'data_unit_id'=> 2,
        'hdd_total_cap'=> 2, //ความจุ HDD
        'os' => 'Windows 10', //ระบบปฏิบัติการ
        'os_arch_id' => 2, //โครงสร้าง
        'ms_office_version' => '2010', //version Office
        'antivirus' => 'ESET7', //version antivirus
        'pdf_reader' => 'Adobe Acrobat Reader DC', //มี PDF READER
        'endnote_version'=> 20, //มี Endnote
        'ie_version'=> 11, //รุ่น IE
        'firefox_version' => null, //รุ่น Firefox
        'chrome_version'=> '88.0.8888.88', //รุ่น Google Chrome
        'spss_version' => 18, //รุ่น SPSS
        'ehis' => $faker->boolean, //มี EHIS
        'sipacs' => $faker->boolean,//มี SiPACS
        'si_iscan' => $faker->boolean, //มี Si-iscan
        'eclair' => $faker->boolean, //มี Eclair
        'admission_note' => $faker->boolean, //มี Admission Notes
        'ur_ward'=> $faker->boolean, // มี UR-Ward
        'sinet' => $faker->boolean, //มี SINET
        'zoom' => $faker->boolean, //มี Zoom
        'webex' => $faker->boolean, //มี WebEx
        'other_software_detail'=> '', //software อื่นๆ
        'lan_outlet_no' => '', //จุด LAN
        'ip_address' => $faker->localIpv4, //IP Address
        'mac_address'=> $faker->macAddress, //MAC Address
        'lan_type_id'=> 2, //เชื่อมต่อเครือข่าย
        'computer_name'=>'computer', //ชื่อเครื่อง
        'is_wireless' => 0, //ใช้ wireless
        'issues' => 'test', //ปัญหาจำลอง
    ];
});
