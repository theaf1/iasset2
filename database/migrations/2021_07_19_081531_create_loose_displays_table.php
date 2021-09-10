<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLooseDisplaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loose_displays', function (Blueprint $table) {
            $table->id();
            $table->string('sapid');
            $table->string('pid')->nullable();
            $table->integer('owner_id');
            $table->integer('mobility_id');
            $table->integer('location_id');
            $table->integer('section_id');
            $table->string('response_person');
            $table->integer('position_id');
            $table->string('tel_no');
            $table->integer('asset_status_id');
            $table->integer('asset_use_status_id');
            $table->string('brand');
            $table->string('model');
            $table->string('serial_no');
            $table->integer('display_type_id');
            $table->integer('display_size');
            $table->integer('display_ratio_id');
            $table->boolean('is_vga')->default(0);
            $table->boolean('is_dvi')->default(0);
            $table->boolean('is_hdmi')->default(0);
            $table->boolean('is_dp')->default(0);
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
        Schema::dropIfExists('loose_displays');
    }
}
