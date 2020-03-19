<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNetworkdevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('networkdevices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sapid')->nullable();
            $table->string('pid')->nullable();
            $table->boolean('is_mobile')->default(0);
            $table->integer('location_id');
            $table->integer('asset_status');
            $table->string('tel_no');
            $table->string('response_person');
            $table->integer('section');
            $table->integer('owner');
            $table->integer('asset_use_status');
            $table->integer('device_subtype');
            $table->string('brand');
            $table->string('model');
            $table->string('serial_no');
            $table->integer('port_count');
            $table->integer('psu_count');
            $table->ipAddress('device_management_address')->nullable();
            $table->string('software_version')->nullable();
            $table->string('issues')->nullable();
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('networkdevices');
    }
}
