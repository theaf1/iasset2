<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLooseDisplaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loose_displays', function (Blueprint $table) {
            $table->id();
            $table->string('sapid'); //รหัส SAP
            $table->string('pid')->nullable(); //รหัสครุภัณฑ์
            $table->integer('owner_id'); //เจ้าของ รับค่าจากตาราง owner
            $table->integer('mobility_id'); //ค่า mobility_id รับค่าจากตาราง Mobility
            $table->integer('location_id'); //ค่า location_id รับค่าจากตาราง Room
            $table->integer('section_id'); //หน่วยงาน รับค่าจากตาราง Section
            $table->string('response_person'); //ผู้รับผิดชอบ
            $table->integer('position_id'); //ตำแหน่ง รับค่าจากตาราง Position
            $table->string('tel_no'); //หมายเลขโทรศัพท์
            $table->integer('asset_status_id'); //สถานะทางทะเบียนครุภัณฑ์ รับค่าจากตาราง Asset_statuses
            $table->integer('asset_use_status_id'); //สถานะการใช้งานครุภัณฑ์ รับค่าจากตาราง Asset_use_statuses
            $table->string('brand'); //ยี่ห้อ
            $table->string('model'); //รุ่น
            $table->string('serial_no'); //หมายเลขประจำเครื่อง
            $table->integer('display_type_id'); //ชนิดของจอภาพ รับค่าจากตาราง DisplayType
            $table->integer('display_size'); //ขนาดจอภาพ
            $table->integer('display_ratio_id'); //สัดส่วนจอภาพ รับค่าจากตาราง DisplayRatio
            $table->boolean('is_vga')->default(0); //รองรับสัญญาณภาพ VGA
            $table->boolean('is_dvi')->default(0); //รองรับสัญญาณภาพ DVI
            $table->boolean('is_hdmi')->default(0); //รองรับสัญญาณภาพ HDMI
            $table->boolean('is_dp')->default(0); //รองรับสัญญาณภาพ DisplayPort
            $table->string('issues')->nullable(); //ปัญหาในการใช้งาน
            $table->string('remarks')->nullable(); //หมายเเหตุ
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
        Schema::dropIfExists('loose_displays');
    }
}
