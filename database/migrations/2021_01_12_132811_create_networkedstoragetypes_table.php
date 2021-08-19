<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Networkedstoragetype;

class CreateNetworkedstoragetypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('networkedstoragetypes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        $NetworkedStorageTypes = array(
            ['name'=>'NAS'],
            ['name'=>'SAN'],
        );
        foreach($NetworkedStorageTypes as $NetworkedStorageType)
        {
            Networkedstoragetype::create($NetworkedStorageType);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('networkedstoragetypes');
    }
}
