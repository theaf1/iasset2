<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNetworkedStoragesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //สร้างตาราง Neที่tworkedstorages
        Schema::create('networked_storages', function (Blueprint $table) {
            $table->bigIncrements('id'); //ลำดับที่
            $table->string('sapid')->nullable(); //รหัส SAP
            $table->string('pid')->nullable(); //รหัสครุภัณฑ์
            $table->integer('location_id'); //ค่า location_id รับจากตาราง Location
            $table->boolean('is_mobile'); //เป็นเครื่องเคลือนที่
            $table->integer('section'); //หน่วยงาน รับค่าจากตาราง Section
            $table->string('tel_no'); //หมายเลขโทรศัพท์
            $table->integer('asset_status'); //สถานะทางทะเบี่ยนครุภัณฑ์ รับค่าจากตาราง Asset_statuses
            $table->integer('asset_use_status'); //สถานะการใช้งาน รับค่าจากตาราง Asset_use_statuses
            $table->integer('type'); //ชนิดของอุปกรณ์
            $table->string('brand'); //ยี่ห้อ
            $table->string('model'); //รุ่น
            $table->string('serial_no'); //serial number จากผู้ผลิต
            $table->float('hdd_total_cap'); //ความจุข้อมูลรวม
            $table->integer('no_of_physical_drive_max'); //จำนวน HDD สูงสุด
            $table->integer('no_of_physical_drive_populated'); //จำนวน HDD ที่มีอยู่
            $table->integer('lun_count'); //จำนวน disk จำลอง
            $table->string('device_name'); //ชื่อเครื่อง
            $table->ipAddress('device_management_address'); //ip address ควบคุมเครื่อง
            $table->string('device_communication_address'); //address ที่ใช้รับส่งข้อมูล
            $table->integer('device_communication_protocol'); //รูปแแบการสื่อสาร
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
        Schema::dropIfExists('networked_storages');
    }
}
