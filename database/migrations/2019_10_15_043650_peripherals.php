<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Peripherals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peripherals', function (Blueprint $table){
            $table->bigincrements('id');
            $table->integer('type');
            $table->string('sapid')->nullable();
            $table->string('pid')->nullable();
            $table->integer('location_id');
            $table->boolean('is_mobile')->default(0);
            $table->string('user');
            $table->string('position');
            $table->integer('section');
            $table->string('tel_no');
            $table->integer('owner');
            $table->integer('asset_status');
            $table->integer('asset_use_status');
            $table->string('remarks')->nullable();
            $table->string('brand');
            $table->string('model');
            $table->string('serial_no');
            $table->integer('supply_consumables');
            $table->integer('connectivity');
            $table->ipAddress('ip_address')->nullable();
            $table->string('lan_outlet_no')->nullable();
            $table->boolean('is_shared')->default(0);
            $table->integer('share_method');
            $table->string('share_name')->nullable();
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
        Schema::dropifexists('peripherals');
    }
}
