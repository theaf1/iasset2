<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Asset_statuses;

class CreateAssetStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //สร้างตาราง Asset_statuses
        Schema::create('asset_statuses', function (Blueprint $table) {
            $table->bigIncrements('id'); //ลำดับที่
            $table->string('name'); //ชื่อสถานะ
            $table->timestamps();
        });
        //กำหนดชื่่อสถานะ
        $asset_statuses=array(
            ['name'=>'รอการขึ้นทะเบียน'],
            ['name'=>'ไม่จำเป็น/ไม่สามารถขึ้นทะเบียนได้'],
            ['name'=>'มีรหัสทรัพย์สินแล้ว'],
            ['name'=>'รอการส่งคืน'],
            ['name'=>'ส่งคืนแล้วโดยไม่ได้รับทดแทน'],
            ['name'=>'ส่งคืนแล้วโดยได้รับทดแทน'],
        );
        //เขียนลงฐานข้อมูล
        foreach($asset_statuses as $asset_status){
            Asset_statuses::create($asset_status);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asset_statuses');
    }
}
