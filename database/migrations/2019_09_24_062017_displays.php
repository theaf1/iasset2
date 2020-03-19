<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Displays extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('displays', function (blueprint $table) {
            $table->bigincrements('id');
            $table->string('client_id');
            $table->string('display_sapid');
            $table->string('display_pid');
            $table->integer('display_size');
            $table->string('display_ratio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropifexists('displays');
    }
}
