<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStorageperipheralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //สร้างตาราง Storageperipherals
        Schema::create('storageperipherals', function (Blueprint $table) {
            $table->bigIncrements('id'); //ลำดับที่
            $table->string('sapid')->nullable(); //รหัส SAP
            $table->string('pid')->nullable(); //รหัสครุภัณฑ์
            $table->string('location_id'); // ค่า location_id รับจากตาราง Location
            $table->integer('mobility_id'); //ค่า mobility_id รับจากตาราง Mobility
            $table->integer('section_id'); //หน่วยงาน รับค่าจากตาราง Sections
            $table->string('user')->nullable(); //ชื่อผู้ใช้งาน
            $table->integer('multi_user_id');
            $table->integer('position_id');
            $table->string('tel_no'); //หมายเลขโทรศัพท์
            $table->integer('owner_id'); //เจ้าของ
            $table->integer('asset_status_id'); //สถานะทางทะเบียนครุภัณฑ์ รับค่าจากตาราง Asset_statuses
            $table->integer('asset_use_status_id'); //สถานะการใช้งานครุภัณท์ รับค่าจากตราง Asset_use_statuses
            $table->string('remarks')->nullable(); //หมายเหตุ
            $table->string('brand'); //ยี่ห้อ
            $table->string('model'); //รุ่น 
            $table->string('serial_no'); //serial number จากผู้ผลิต
            $table->integer('connectivity'); //วิธีการเชื่อมต่อ
            $table->boolean('is_hotswap')->default(0); //เป็นอุปกรณ์ hotswap
            $table->float('total_capacity'); //ความจุข้อมูลรวม
            $table->integer('data_unit'); //หน่วยวัดข้อมูล
            $table->integer('no_of_physical_drive_max')->nullable(); //จำนวน HDD สูงสุด
            $table->integer('no_of_physical_drive_populated')->nullable(); //จำนวน HDD ที่มีอยู่
            $table->integer('lun_count')->nullable(); //จำนวน disk จำลอง
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
        Schema::dropIfExists('storageperipherals');
    }
}
