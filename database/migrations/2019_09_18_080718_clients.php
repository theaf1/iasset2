<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Clients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (blueprint $table) {
            $table->bigincrements('id');
            $table->integer('type');
            $table->string('sapid')->nullable();
            $table->string('pid')->nullable();
            $table->integer('section');
            $table->boolean('is_mobile')->default(0);
            $table->integer('location_id');
            $table->string('user')->nullable();
            $table->boolean('multi_user')->default(0);
            $table->string('position');
            $table->string('tel_no');
            // $table->integer('section_status');
            $table->integer('function');
            $table->integer('owner');
            $table->boolean('permission');
            $table->integer('asset_status');
            $table->integer('asset_use_status');
            $table->string('remarks')->nullable();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('serial_no')->nullable();
            $table->string('cpu_model');
            $table->float('cpu_speed',4,2);
            $table->integer('cpu_socket_number');
            $table->float('ram_size',5,3);
            $table->integer('hdd_no');
            $table->integer('data_unit');
            $table->float('hdd_total_cap',6,3);
            // $table->integer('display_no');
            $table->string('os');
            $table->integer('os_arch');
            $table->string('ms_office_version');
            $table->string('antivirus');
            $table->string('pdf_reader');
            $table->integer('ie_version');
            $table->string('chrome_version');
            $table->integer('spss_version');
            $table->boolean('ehis')->default(0);
            $table->boolean('sipacs')->default(0);
            $table->boolean('si_iscan')->default(0);
            $table->boolean('eclair')->default(0);
            $table->boolean('admission_note')->default(0);
            $table->boolean('sinet')->default(0);
            // $table->boolean('other_software')->default(0);
            $table->string('other_software_detail')->nullable();
            $table->integer('lan_type');
            $table->string('lan_outlet_no')->nullable();
            $table->ipAddress('ip_address')->nullable();
            $table->macAddress('mac_address')->nullable();
            $table->string('computer_name')->nullable();
            $table->boolean('is_wireless')->default(0);
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
        Schema::dropifexists('clients');
    }
}
