<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Peripheraltype;

class CreatePeripheraltypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //สร้างตาราง Peripheraltypes
        Schema::create('peripheraltypes', function (Blueprint $table) {
            $table->bigIncrements('id');//ลำดับที่
            $table->string('name');//ชื่อชนิด
            $table->timestamps();
        });
        //กำหนดชื่อชนิด
        $peripheraltypes=array(
            ['name'=>'Printer'],
            ['name'=>'Scanner'],
            ['name'=>'Barcode Printer'],
            ['name'=>'Barcode Scanner'],
            ['name'=>'Multifunction Machine'],
        );
        //เขียนข้อมูลลงฐานข้อมูล
        foreach($peripheraltypes as $peripheraltype){
            Peripheraltype::create($peripheraltype);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peripheraltypes');
    }
}
