<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNetworkdevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //สร้างตาราง Networkdevices
        Schema::create('networkdevices', function (Blueprint $table) {
            $table->bigIncrements('id'); //ลำดับที่
            $table->string('sapid')->nullable(); //รหัส SAP
            $table->string('pid')->nullable(); //รหัสครุภัณฑ์
            $table->boolean('is_mobile')->default(0); //เป็นเครื่องเคลื่อนที่
            $table->integer('location_id'); //ค่า location_id รับจากตาราง Location
            $table->integer('asset_status_id'); //สถานะทางทะเบียนครุภัณฑ์
            $table->string('tel_no'); //หมายเลขโทรศัพท์
            $table->string('response_person'); //ผู้รับผิดชอบ
            $table->integer('section_id'); //หน่วยงาน รับค่าจากตาราง Section
            $table->integer('owner_id'); //เจ้าของ รับค่าจากตาราง Owner
            $table->integer('asset_use_status_id'); //สถานะการใช้งาน รับค่าจากตาราง Asset_use_statuses
            $table->integer('device_subtype_id'); //ชนิดของอุปกรณ์ รับค่่าจากตาราง Net_Subtype
            $table->string('brand'); //ยี่ห้อ
            $table->string('model'); //รุ่น
            $table->string('serial_no'); //serial number จากผู้ผลิต
            $table->integer('port_count'); //จำนวน port
            $table->integer('psu_count'); //จำนวน power supply
            $table->ipAddress('device_management_address')->nullable(); //ip address ที่ใช้ควบคุมเครื่อง
            $table->string('software_version')->nullable(); //รุ่นโปรแกรมภายในเครื่อง
            $table->string('issues')->nullable(); //ปัญหาในการใช้งาน
            $table->string('remarks')->nullable(); //หมายเหตุ
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
        Schema::dropIfExists('networkdevices');
    }
}
