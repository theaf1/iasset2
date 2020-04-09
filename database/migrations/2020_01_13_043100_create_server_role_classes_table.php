<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\ServerRoleClass;

class CreateServerRoleClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //สร้งตาราง ServerRoleClass
        Schema::create('server_role_classes', function (Blueprint $table) {
            $table->bigIncrements('id'); //ลำดับที่
            $table->string('name'); //ชื่อกลุ่ม
            $table->timestamps();
        });
        //กำหนดชื่อกลุ่ม
        $server_role_classes=array(
            ['name'=>'Infrastrcture'],
            ['name'=>'Application'],
            ['name'=>'Security'],
        );
        //เขียนข้อมูลลงฐานข้อมูล
        foreach($server_role_classes as $server_role_class){
            ServerRoleClass::create($server_role_class);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('server_role_classes');
    }
}
