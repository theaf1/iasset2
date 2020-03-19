<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStorageperipheralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storageperipherals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sapid')->nullable();
            $table->string('pid')->nullable();
            $table->string('location_id');
            $table->boolean('is_mobile');
            $table->integer('section');
            $table->string('user');
            $table->string('tel_no');
            $table->integer('function');
            $table->integer('owner');
            $table->integer('asset_status');
            $table->integer('asset_use_status');
            $table->string('remarks')->nullable();
            $table->string('brand');
            $table->string('model');
            $table->string('serial_no');
            $table->integer('connectivity');
            $table->boolean('is_hotswap')->default(0);
            $table->float('total_capacity');
            $table->integer('data_unit');
            $table->integer('no_of_physical_drive_max')->nullable();
            $table->integer('no_of_physical_drive_populated')->nullable();
            $table->integer('lun_count')->nullable();
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
        Schema::dropIfExists('storageperipherals');
    }
}
