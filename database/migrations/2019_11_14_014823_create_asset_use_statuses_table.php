<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Asset_use_statuses;

class CreateAssetUseStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_use_statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });

        $asset_use_statuses=array(
            ['name'=>'รอการติดตั้ง'],
            ['name'=>'ใช้งาน'],
            ['name'=>'ไม่ได้ใช้งาน'],
            ['name'=>'ส่งซ่อม'],
            ['name'=>'ส่งคืนแล้ว'],
        );
        foreach($asset_use_statuses as $asset_use_status){
            Asset_use_statuses::create($asset_use_status);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asset_use_statuses');
    }
}
