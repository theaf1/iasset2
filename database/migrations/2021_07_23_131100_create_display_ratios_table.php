<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\DisplayRatio;

class CreateDisplayRatiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('display_ratios', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $DisplayRatios = array(
            ['name'=>'4:3'],
            ['name'=>'5:4'],
            ['name'=>'16:9'],
            ['name'=>'16:10'],
        );
        foreach ($DisplayRatios as $DisplayRatio)
        {
            DisplayRatio::create($DisplayRatio);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('display_ratios');
    }
}
