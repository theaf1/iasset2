<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Clienttype;

class CreateClienttypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //สร้างตาราง Clienttypes
        Schema::create('clienttypes', function (Blueprint $table) {
            $table->bigIncrements('id'); //ลำดับที่
            $table->string('name'); //ชื่อชนิด
            $table->timestamps();
        });
        //กำหนดชื่อชนิด
        $clienttypes=array(
            ['name'=>'PC'],
            ['name'=>'Notebook'],
            ['name'=>'All-in-one'],
            ['name'=>'Workstation'],
        );
        //เขียนข้อมูลลงฐานข้อมูล
        foreach($clienttypes as $clienttype){
            Clienttype::create($clienttype);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clienttypes');
    }
}
