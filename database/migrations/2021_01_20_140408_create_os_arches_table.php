<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\OsArch;

class CreateOsArchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('os_arches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        $OsArches = array(
            ['name'=>'32 bit'],
            ['name'=>'64 bit'],
        );
        foreach($OsArches as $OsArch)
        {
            OsArch::create($OsArch);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('os_arches');
    }
}
