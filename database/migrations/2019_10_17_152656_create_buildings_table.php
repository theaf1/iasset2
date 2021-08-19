<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Building;
class CreateBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //สร้างตาราง Buildings
        Schema::create('buildings', function (Blueprint $table) {
            $table->increments('id'); //ลำดับที่
            $table->string('name'); //ชื่ออาคาร
            $table->timestamps();
        });
        //import data
        Building::loadData('buildings');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buildings');
    }
}
