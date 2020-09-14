<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\DataUnit;

class CreateDataUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_units', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        $DataUnits = array(
            ['name'=>'GB'],
            ['name'=>'TB'],
        );
        foreach($DataUnits as $DataUnit)
        {
            DataUnit::create($DataUnit);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_units');
    }
}
