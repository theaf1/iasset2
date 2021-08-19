<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Section;
class Sections extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //สร้างตาราง Sections
        Schema::create('sections', function (blueprint $table) {
            $table->bigincrements('id'); //ลำดับที่
            $table->string('name'); //ชื่อหน่วยงาน
            $table->integer('client_id')->default(0); //client ID จากตาราง client
            $table->timestamps();  
        });
        //นำข้อมูลเข้าสู่ฐานข้อมูล
        Section::loadData('sections');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropifexists('sections');
    }
}
