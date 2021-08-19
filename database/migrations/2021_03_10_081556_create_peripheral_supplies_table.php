<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\PeripheralSupply;

class CreatePeripheralSuppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peripheral_supplies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        $Supplies = array(
            ['name'=>'เบิกได้'],
            ['name'=>'เบิกไม่ได้'],
            ['name'=>'ไม่จำเป็น'],
        );
        foreach($Supplies as $Supply)
        {
            PeripheralSupply::create($Supply);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peripheral_supplies');
    }
}
