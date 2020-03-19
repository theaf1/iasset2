<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Asset_statuses;

class CreateAssetStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });

        $asset_statuses=array(
            ['name'=>'รอการขึ้นทะเบียน'],
            ['name'=>'ไม่จำเป็น/ไม่สามารถขึ้นทะเบียนได้'],
            ['name'=>'มีรหัสทรัพย์สินแล้ว'],
            ['name'=>'รอการส่งคืน'],
            ['name'=>'ส่งคืนแล้วโดยไม่ได้รับทดแทน'],
            ['name'=>'ส่งคืนแล้วโดยได้รับทดแทน'],
        );
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
