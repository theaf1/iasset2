<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Owner;

class CreateOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //สร้างตาราง Owners
        Schema::create('owners', function (Blueprint $table) {
            $table->bigIncrements('id'); //ลำดับที่
            $table->string('name'); //ชื่อเจ้าของ
            $table->timestamps();
        });
        //กำหนดชื่อเจ้าของ
        $Owners=array(
            ['name'=>'คณะ'],
            ['name'=>'ภาควิชา'],
        );
        //เขียนข้อมูลงฐานข้อมูล
        foreach($Owners as $Owner){
            Owner::create($Owner);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('owners');
    }
}
