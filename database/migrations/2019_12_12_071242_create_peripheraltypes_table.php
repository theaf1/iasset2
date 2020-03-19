<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Peripheraltype;

class CreatePeripheraltypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peripheraltypes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });
        $peripheraltypes=array(
            ['name'=>'Printer'],
            ['name'=>'Scanner'],
            ['name'=>'Barcode Printer'],
            ['name'=>'Barcode Scanner'],
            ['name'=>'Multifunction Machine'],
        );
        foreach($peripheraltypes as $peripheraltype){
            Peripheraltype::create($peripheraltype);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peripheraltypes');
    }
}
