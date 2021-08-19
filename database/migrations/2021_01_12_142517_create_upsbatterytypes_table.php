<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Upsbatterytype;

class CreateUpsbatterytypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upsbatterytypes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        $BatteryTypes = array(
            ['name'=>'ตะกั่ว-กรด (ปิดผนึก)'],
            ['name'=>'ตะกั่ว-กรด (เติมน้้ากลั่น)'],
            ['name'=>'ลิเธียมไอออน']
        );
        foreach($BatteryTypes as $BatteryType)
        {
            Upsbatterytype::create($BatteryType);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('upsbatterytypes');
    }
}
