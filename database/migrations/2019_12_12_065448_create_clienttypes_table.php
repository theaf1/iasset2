<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Clienttype;

class CreateClienttypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clienttypes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });
        $clienttypes=array(
            ['name'=>'PC'],
            ['name'=>'Notebook'],
            ['name'=>'All-in-one'],
            ['name'=>'Workstation'],
        );
        foreach($clienttypes as $clienttype){
            Clienttype::create($clienttype);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clienttypes');
    }
}
