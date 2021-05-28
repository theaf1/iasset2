<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\ClientOperate;

class CreateClientOpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_operates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $ClientOSes = array(
            ['name'=>'Windows XP'],
            ['name'=>'Windows 7'],
            ['name'=>'Windows 8'],
            ['name'=>'Windows 8.1'],
            ['name'=>'Windows 10'],
        );
        foreach ($ClientOSes as $ClientOS) {
            ClientOperate::create($ClientOS);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_ops');
    }
}
