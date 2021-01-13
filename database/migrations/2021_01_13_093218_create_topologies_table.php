<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Topology;

class CreateTopologiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topologies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        $Topologies = array(
            ['name'=>'stand-by'],
            ['name'=>'line interactive'],
            ['name'=>'on-line'],
        );
        foreach($Topologies as $Topology)
        {
            Topology::create($Topology);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('topologies');
    }
}
