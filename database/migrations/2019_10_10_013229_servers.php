<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Servers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servers', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->string('sapid')->nullable();
            $table->string('pid')->nullable();
            $table->integer('location_id');
            $table->integer('section');
            $table->boolean('is_mobile')->default(0);
            $table->string('tel_no');
            $table->string('response_person');
            $table->integer('owner');
            $table->integer('asset_status');
            $table->integer('asset_use_status');
            $table->string('brand');
            $table->string('model');
            $table->integer('form_factor');
            $table->string('serial_no');
            $table->string('cpu_model');
            $table->float('cpu_speed', 4, 2);
            $table->integer('cpu_socket_no');
            $table->float('ram_size', 5, 3);
            $table->boolean('is_raid')->default(0);
            $table->integer('no_of_physical_drive_max');
            $table->integer('no_of_physical_drive_populated');
            $table->integer('lun_count');
            $table->integer('hdd_total_cap');
            $table->integer('data_unit');
            $table->boolean('is_headless')->default(0);
            $table->string('display_sapid')->nullable();
            $table->string('display_pid')->nullable();
            $table->string('os');
            $table->integer('os_arch');
            $table->integer('role_class');
            $table->boolean('is_ad')->default(0);
            $table->boolean('is_dns')->default(0);
            $table->boolean('is_dhcp')->default(0);
            $table->boolean('is_fileshare')->default(0);
            $table->boolean('is_web')->default(0);
            $table->boolean('is_db')->default(0);
            $table->boolean('is_log')->default(0);
            $table->boolean('other_software')->default(0);
            $table->string('other_software_detail')->nullable();
            $table->integer('lan_type');
            $table->string('lan_outlet_no')->nullable();
            $table->ipAddress('ip_address');
            $table->macAddress('mac_address');
            $table->string('computer_name');
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
        Schema::dropifexists('servers');
    }
}
