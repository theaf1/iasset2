<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\PeripheralConnect;

class CreatePeripheralConnectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peripheral_connects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        $Connections = array(
            ['name'=>'USB'],
            ['name'=>'Paralell port'],
            ['name'=>'LAN'],
        );
        foreach($Connections as $Connection)
        {
            PeripheralConnect::create($Connection);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peripheral_connects');
    }
}
