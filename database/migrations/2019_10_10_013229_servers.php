<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Servers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //สร้างตาราง servers
        Schema::create('servers', function (Blueprint $table) {
            $table->bigincrements('id'); //ลำดับที่
            $table->string('sapid')->nullable(); //รหัส SAP
            $table->string('pid')->nullable(); //รหัสครุภัณฑ์
            $table->integer('location_id'); //ค่า location_id รับมาจากตาราง Location 
            $table->integer('section_id'); //หน่วยงาน รับค่าจากตาราง Section
            $table->integer('mobility_id'); //ค่า mobility_id รับจากตาราง Mobility
            $table->string('tel_no'); //หมายเลขโทรศัพท์
            $table->string('response_person'); //ชื่อผู้รับผิดชอบ
            $table->integer('owner_id'); //เจ้าของ รับค่าจากตาราง Owner
            $table->integer('asset_status_id'); //สถานะทางทะเบียนครุภัณฑ์ รับจากตาราง Asset_statuses
            $table->integer('asset_use_status_id'); //สถานะการใช้งาน รับค่าจากตาราง Asset_use_statuses
            $table->string('brand'); //ยึีห้อ
            $table->string('model'); //รุ่น
            $table->integer('form_factor_id'); //ลักษะเครือง รับค่าจากตาราง Formfactor
            $table->string('serial_no'); //serial number จากผู้ผลิต
            $table->string('cpu_model'); //ยี่ห้อ รุ่น CPU
            $table->float('cpu_speed', 4, 2); //ความเร็ว CPU
            $table->integer('cpu_socket_no'); //จำนวน socket CPU
            $table->float('ram_size', 5, 3); //จำนวน RAM
            $table->boolean('is_raid')->default(0); //ใช้งาน RAID
            $table->integer('no_of_physical_drive_max'); //จำนวน HDD สูงสุด
            $table->integer('no_of_physical_drive_populated'); //จำนวน HDD ในเครื่อง
            $table->integer('lun_count'); //จำนวน disk จำลอง
            $table->integer('hdd_total_cap'); //ความจุข้อมูลรวม
            $table->integer('data_unit_id'); //หน่วยวัดข้อมูล รับค่าจากตาราง DataUnit
            $table->integer('os_id'); //ระบบปฏิบัติการ รับค่าจากตาราง ServerOS
            $table->integer('os_arch_id'); //โครงสร้างระบบปฏิบัติการ รับค่าจากตาราง OsArch
            $table->integer('role_class_id'); //กลุ่มของบทบาท
            $table->boolean('is_ad')->default(0); //เป็น Domain controller
            $table->boolean('is_dns')->default(0); //เป็น DNS
            $table->boolean('is_dhcp')->default(0); //เป็น DHCP
            $table->boolean('is_fileshare')->default(0); //เป็น File server
            $table->boolean('is_web')->default(0); //เป็น Web server
            $table->boolean('is_db')->default(0); //เป็น Database server
            $table->boolean('is_log')->default(0); //เป็น Logging server
            $table->boolean('other_software')->default(0); //มี software อื่นๆ
            $table->string('other_software_detail')->nullable(); //รายละเอียด software อืนๆ
            $table->integer('lan_type_id'); //ประเภทการเชื่อมต่อ รับค่าจากตาราง Networkconnection
            $table->string('lan_outlet_no')->nullable(); //หมายเลขจุด LAN
            $table->ipAddress('ip_address'); //ip address
            $table->macAddress('mac_address'); //MAC address
            $table->string('computer_name'); //ชื่อเครื่อง
            $table->string('remarks')->nullable(); //หมายเหตุ
            $table->string('issues')->nullable(); //ปัญหาในการใช้งาน
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropifexists('servers');
    }
}
