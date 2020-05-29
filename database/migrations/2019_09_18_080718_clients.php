<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Clients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (blueprint $table) {
            $table->bigincrements('id'); //ลำดับที่
            $table->integer('type_id'); //ชนิด
            $table->string('sapid')->nullable(); //รหัส SAP
            $table->string('pid')->nullable(); //รหัสครุภัณฑ์
            $table->integer('section_id'); //หน่วยงาน รับค่าจากตาราง Sections
            $table->integer('mobility_id'); //เป็นเครื่องเคลื่อนที่ได้ รับค่าจากตาราง mobility
            $table->integer('location_id'); //ค่า location_id รับจากตาราง Location
            $table->string('user')->nullable(); //ชื่อผู้ใช้งาน
            $table->boolean('multi_user')->default(0); //เป็นเครื่องใช้งานส่วนกลาง
            $table->string('position_id'); //ตำแหน่งผู้ใช้งาน รับค่าจากตาราง Position
            $table->string('tel_no'); //หมายเลขโทรศัพท์
            // $table->integer('section_status');
            $table->integer('function'); //ระบบงาน
            $table->integer('owner_id'); //เจ้าของเครือง
            $table->boolean('permission'); //อำนาจ admin
            $table->integer('asset_status_id'); //สถานะทางทะเบียนครุภัณฑ์
            $table->integer('asset_use_status_id'); //สถานะการใช้งานครุภัณฑ์
            $table->string('remarks')->nullable(); //หมายเหตุ
            $table->string('brand')->nullable(); //ยี่ห้อ
            $table->string('model')->nullable(); //รุ่น
            $table->string('serial_no')->nullable(); //serial number จากผู้ผลิต
            $table->string('cpu_model'); //รุ่น CPU
            $table->float('cpu_speed',4,2); //ความเร็ว CPU
            $table->integer('cpu_socket_number'); //จำนวน Scoket CPU
            $table->float('ram_size',5,3); //จำนวน RAM
            $table->integer('hdd_no'); //จำนวน HDD ในเครื่อง
            $table->integer('data_unit'); //หน่วยวัดข้อมูล
            $table->float('hdd_total_cap',6,3); //ความจุข้อมูล
            // $table->integer('display_no');
            $table->string('os'); //ระบบปฏิบัติการ
            $table->integer('os_arch'); //โครงสร้างระบบปฎิบัติการ
            $table->string('ms_office_version'); //รุ่น microsoft office
            $table->string('antivirus'); //ยี่ห้อ-รุ่น antivirus
            $table->string('pdf_reader'); //ยี่ห้อ-รุ่น โปรแกรมอ่านไฟล์ PDF
            $table->string('endnote_version')->nullable(); //รุ่น โปรแกรม Endnote
            $table->integer('ie_version'); //รุ่นของ Internet Explorer
            $table->string('firefox_version')->nullable(); //รุ่น โปรแกรม Firefox
            $table->string('chrome_version'); //รุ่นของ google chrome
            $table->integer('spss_version')->nullable(); //รุ่นของ SPSS
            $table->boolean('ehis')->default(0); //มี eHIS
            $table->boolean('sipacs')->default(0); //มี SiPACS
            $table->boolean('si_iscan')->default(0); //มี Si-iScan
            $table->boolean('eclair')->default(0); //มี Eclair
            $table->boolean('admission_note')->default(0); //มี Admission Notes
            $table->boolean('ur_ward')->default(0); //มี UR-Ward
            $table->boolean('sinet')->default(0); //มี SiNET
            // $table->boolean('other_software')->default(0);
            $table->string('other_software_detail')->nullable(); //โปรแกรมอื่นๆ
            $table->integer('lan_type'); //ชนิดการเชื่อมต่อเครือข่าย รับค่าจากตาราง NetworkConnections
            $table->string('lan_outlet_no')->nullable(); //หมายเลขจุด LAN
            $table->ipAddress('ip_address')->nullable(); //ip addressของเครื่อง
            $table->macAddress('mac_address')->nullable(); //mac address ของเครื่อง
            $table->string('computer_name')->nullable(); //ชื่อเครื่องคอมพิวเตอร์
            $table->boolean('is_wireless')->default(0); //การใช้งานเครือข่ายไร้สาย
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
        Schema::dropifexists('clients');
    }
}
