<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Room;
class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //สร้างตาราง Rooms
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id'); //ลำดับที่
            $table->integer('location_id'); //สถานที่ (foreign key จากตาราง Location)
            $table->string('name'); //ชื่อห้อง
            $table->timestamps();
        });

        Room::loadData('rooms');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
