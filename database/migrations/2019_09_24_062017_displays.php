<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Displays extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //สร้างตาราง Displays
        Schema::create('displays', function (blueprint $table) {
            $table->bigincrements('id'); //ลำดับที่
            $table->string('client_id'); //หมายเลข Client (foreign key จากตาราง Clients)
            $table->string('display_sapid')->nullable(); //รหัส SAP ของจอ
            $table->string('display_pid')->nullable(); //รหัสครุภัณฑ์ของจอภาพ
            $table->float('display_size',8,1); //ขนาดจอภาพ
            $table->integer('display_ratio_id'); //สัดส่วนจอภาพ
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
        Schema::dropifexists('displays');
    }
}
