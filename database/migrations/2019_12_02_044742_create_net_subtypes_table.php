<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\NetSubtype;

class CreateNetSubtypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //สร้างตาราง Net_subtypes
        Schema::create('net_subtypes', function (Blueprint $table) {
            $table->bigIncrements('id'); //ลำดับที่
            $table->string('name'); //ชื่่อชนิดอุปกรณ์
            $table->timestamps();
        });
        //กำหนดชื่อ
        $netsubtypes=array(
            ['name'=>'Hub'],
            ['name'=>'Unmanaged Switch'],
            ['name'=>'Managed Switch'],
            ['name'=>'Router'],
            ['name'=>'Wireless Access Point'],
            ['name'=>'อุปกรณเครือข่ายอื่นๆ'],
        );
        //เขียนข้อมูลลงฐานข้อมูล
        foreach($netsubtypes as $netsubtype){
            Netsubtype::create($netsubtype);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('net_subtypes');
    }
}
