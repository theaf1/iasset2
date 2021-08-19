<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Location;
class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //สร้างตาราง Locations
        Schema::create('locations', function (Blueprint $table) {
            $table->bigIncrements('id'); //ลำดับที่
            $table->integer('building_id'); //อาคาร (foreign key จากตาราง Buildings)
            $table->integer('floor'); //ชั้น
            $table->string('wing'); //ปีก
            $table->timestamps();
        });
        //import data
        Location::loadData('locations');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
