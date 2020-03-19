<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\NetworkConnection;

class CreateNetworkConnectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('network_connections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });
        $NetworkConnections=array(
            ['name'=>'ไม่เชื่อมต่อกับเครือข่ายใดๆ'],
            ['name'=>'MUCNET'],
            ['name'=>'Internet โรงพยาบาล'],
            ['name'=>'เครือข่ายภายในโรงพยาบาล'],
            ['name'=>'เชื่อมต่อมากกว่า 1 เครือข่ายในเวลาเดียวกัน'],
        );
        foreach($NetworkConnections as $NetworkConnection){
            NetworkConnection::create($NetworkConnection);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('network_connections');
    }
}
