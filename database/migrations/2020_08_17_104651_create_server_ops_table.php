<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\ServerOp;

class CreateServerOpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('server_ops', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        //กำหนดชื่อ OS
        $server_oses = array(
            ['name'=>'Windows Server 2003'],
            ['name'=>'Windows Server 2008'],
            ['name'=>'Windows Server 2012'],
            ['name'=>'Windows Server 2016'],
            ['name'=>'Windows Server 2019'],
            ['name'=>'Ubuntu Server'],
            ['name'=>'VMware Hypervisor'],
        );
        foreach($server_oses as $server_os)
        {
            ServerOp::create($server_os);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('server_ops');
    }
}
