<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNetworkedStoragesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('networked_storages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sapid')->nullable();
            $table->string('pid')->nullable();
            $table->integer('location_id');
            $table->boolean('is_mobile');
            $table->integer('section');
            $table->string('tel_no');
            $table->integer('asset_status');
            $table->integer('asset_use_status');
            $table->integer('type');
            $table->string('brand');
            $table->string('model');
            $table->string('serial_no');
            $table->float('hdd_total_cap');
            $table->integer('no_of_physical_drive_max');
            $table->integer('no_of_physical_drive_populated');
            $table->integer('lun_count');
            $table->string('device_name');
            $table->ipAddress('device_management_address');
            $table->string('device_communication_address');
            $table->integer('device_communication_protocol');
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
        Schema::dropIfExists('networked_storages');
    }
}
