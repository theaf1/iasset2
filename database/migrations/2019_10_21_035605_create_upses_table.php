<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //สร้างตาราง Upses
        Schema::create('upses', function (Blueprint $table) {
            $table->bigIncrements('id'); //ลำดับที่
            $table->string('sapid')->nullable(); //รหัส SAP
            $table->string('pid')->nullable(); //รหัสครุภัณฑ์
            $table->integer('location_id'); //ค่า location_id รับจากตาราง Location
            $table->boolean('is_mobile')->default(0); //เป็นเครื่องเคลือนที่
            $table->string('response_person'); //ผู้รับผิดชอบ
            $table->integer('section_id'); //หน่วยงาน รับค่าจากตาราง Section
            $table->string('tel_no'); //หมายเลขโทรศัพท์
            $table->integer('owner_id'); //เจ้าของ รับค่าจากตาราง Owner
            $table->integer('asset_status_id'); //สถานะทางทะเบียนครุภัณฑ์ รับค่าจากตาราง Asset_statuses
            $table->integer('asset_use_status_id'); //สถานะการใช้งาน
            $table->string('brand'); //ยี่ห้อ
            $table->string('model'); //รุ่น
            $table->string('serial_no'); //serial number จากผู้ผลิต
            $table->integer('form_factor'); //ลักษณะเครื่อง
            $table->integer('topology'); //หลักการทำงาน
            $table->float('capacity', 7, 5); //กำลังไฟฟ้า
            $table->boolean('is_modular')->default(0); //ขยายขนาดได้
            $table->integer('battery_type'); //ชนิดของ battery
            $table->boolean('has_external_battery')->default(0); //ตู้ battery ภายนอก
            $table->ipAddress('device_management_address')->nullable(); //ip address ที่ใช้ควบคุมเครื่อง
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
        Schema::dropIfExists('upses');
    }
}
