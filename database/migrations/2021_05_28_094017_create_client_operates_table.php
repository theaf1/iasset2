<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\ClientOperate;

class CreateClientOperatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //กำหนดชื่อและคุณสมบัติตาราง
        Schema::create('client_operates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        //กำหนดข้อมูลเบื่องต้นของตาราง
        $ClientOSes = array(
            ['name'=>'Windows XP'],
            ['name'=>'Windows 7'],
            ['name'=>'Windows 8'],
            ['name'=>'Windows 8.1'],
            ['name'=>'Windows 10'],
        );

        //เขียนข้อมูลเบื้องต้นลงตาราง
        foreach ($ClientOSes as $ClientOS) {
            ClientOperate::create($ClientOS);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_operates');
    }
}
