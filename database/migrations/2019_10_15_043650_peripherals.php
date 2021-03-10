<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Peripherals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //สร้างตาราง Peripherals
        Schema::create('peripherals', function (Blueprint $table){
            $table->bigincrements('id'); //ลำดับที่
            $table->integer('type_id'); //ชนิด รับค่าจากตาราง Peripheraltypes
            $table->string('sapid')->nullable(); //รหัส SAP
            $table->string('pid')->nullable(); //รหัสครุภัณฑ์
            $table->integer('location_id'); //ค่า location_id รับจากตาราง Location
            $table->integer('mobility_id'); //ค่า Mobility_id รับจากตาราง mobility
            $table->integer('multi_user_id'); //ค่า multi_user_id รับจากตาราง multiuser
            $table->string('user'); //ชื่อผู้ใช้งาน
            $table->integer('position_id'); //ตำแหน่งผู้ใช้งาน รับจากตาราง position
            $table->integer('section_id'); //หน่วยงาน รับค่าจากตาราง Section
            $table->string('tel_no'); //หมายเลขโทรศัพท์
            $table->integer('owner_id'); //เจ้าของ รับค่าจากตาราง Owner
            $table->integer('asset_status_id'); //สถานะทางทะเบียนครุภัณฑ์ รับค่าจากตาราง Asset_statuses 
            $table->integer('asset_use_status_id'); //สถานะการใช้งาน รับค่าจากตาราง Asset_use_statuses
            $table->string('remarks')->nullable(); //หมายเหตุ
            $table->string('brand'); //ยี่ห้อ
            $table->string('model'); //รุ่น
            $table->string('serial_no'); //serial number จากผู้ผลิต
            $table->integer('supply_consumables_id'); //วัสดุสึกหรอสิ้นเปลือง
            $table->integer('connectivity_id'); //วิธีการเชื่อมต่อ
            $table->ipAddress('ip_address')->nullable(); //ip address
            $table->string('lan_outlet_no')->nullable(); //หมายเลขจุด LAN
            $table->boolean('is_shared')->default(0); //ใช้งานร่วมกัน
            $table->integer('share_method')->nullable(); //วิธี share
            $table->string('share_name')->nullable(); //ชื่อที่ใช้ในการ share
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
        Schema::dropifexists('peripherals');
    }
}
