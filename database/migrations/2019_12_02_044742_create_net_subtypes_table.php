<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\NetSubtype;

class CreateNetSubtypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('net_subtypes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });
        $netsubtypes=array(
            ['name'=>'Hub'],
            ['name'=>'Unmanaged Switch'],
            ['name'=>'Managed Switch'],
            ['name'=>'Router'],
            ['name'=>'Wireless Access Point'],
            ['name'=>'อุปกรณเครือข่ายอื่นๆ'],
        );
        foreach($netsubtypes as $netsubtype){
            Netsubtype::create($netsubtype);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('net_subtypes');
    }
}
