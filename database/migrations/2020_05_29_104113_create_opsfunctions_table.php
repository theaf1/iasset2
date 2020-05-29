<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Opsfunction;

class CreateOpsfunctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opsfunctions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        $Opsfunctions = array(
            ['name'=>'ระบบสำนักงาน'],
            ['name'=>'ระบบโรงพยาบาล'],
        );
        foreach ($Opsfunctions as $Opsfunction) {
            Opsfunction::create($Opsfunction);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opsfunctions');
    }
}
