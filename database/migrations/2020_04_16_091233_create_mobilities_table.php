<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Mobility;

class CreateMobilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobilities', function (Blueprint $table) {
            $table->id();
            $table->boolean('value')->default(0);
            $table->string('name');
            $table->timestamps();
        });
        $Mobilities = array(
            ['value'=>'0', 'name'=>'เป็นเครื่องเคลื่อนที่'],
            ['value'=>'1', 'name'=>'เป็นเครื่องประจำที่'],
        );

        foreach ($Mobilities as $Mobility){
            Mobility::create($Mobility);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mobilities');
    }
}
