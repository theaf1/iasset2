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
            $table->integer('mobility_id'); //ค่า mobility_id รับจากตาราง Mobility
            $table->integer('section_id'); //หน่วยงาน รับค่าจากตาราง Section
            $table->string('response_person'); //ผู้รับผิดชอบ
            $table->string('tel_no'); //หมายเลขโทรศัพท์
            $table->integer('owner_id'); //เจ้าของ
            $table->integer('asset_status_id'); //สถานะทางทะเบี่ยนครุภัณฑ์ รับค่าจากตาราง Asset_statuses
            $table->integer('asset_use_status_id'); //สถานะการใช้งาน รับค่าจากตาราง Asset_use_statuses
            $table->integer('type'); //ชนิดของอุปกรณ์
            $table->string('brand'); //ยี่ห้อ
            $table->string('model'); //รุ่น
            $table->string('serial_no'); //serial number จากผู้ผลิต
            $table->integer('data_unit_id'); //หน่วยวัดข้อมูล รับค่าจากตาราง DataUnit
            $table->float('hdd_total_cap', 6, 4); //ความจุข้อมูลรวม
            $table->integer('no_of_physical_drive_max'); //จำนวน HDD สูงสุด
            $table->integer('no_of_physical_drive_populated'); //จำนวน HDD ที่มีอยู่
            $table->integer('lun_count'); //จำนวน disk จำลอง
            $table->string('device_name'); //ชื่อเครื่อง
            $table->ipAddress('device_management_address'); //ip address ควบคุมเครื่อง
            $table->string('device_communication_address'); //address ที่ใช้รับส่งข้อมูล
            $table->boolean('is_smb')->default(0);
            $table->boolean('is_fc')->default(0);
            $table->boolean('is_iscsi')->default(0);
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
