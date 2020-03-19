<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sapid')->nullable();
            $table->string('pid')->nullable();
            $table->integer('location_id');
            $table->boolean('is_mobile')->default(0);
            $table->string('response_person');
            $table->integer('section');
            $table->string('tel_no');
            $table->integer('owner');
            $table->integer('asset_status');
            $table->integer('asset_use_status');
            $table->string('brand');
            $table->string('model');
            $table->string('serial_no');
            $table->integer('form_factor');
            $table->integer('topology');
            $table->float('capacity', 7, 5);
            $table->boolean('is_modular')->default(0);
            $table->integer('battery_type');
            $table->boolean('has_external_battery')->default(0);
            $table->ipAddress('device_management_address')->nullable();
            $table->string('remarks')->nullable();
            $table->string('issues')->nullable();
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
        Schema::dropIfExists('upses');
    }
}
