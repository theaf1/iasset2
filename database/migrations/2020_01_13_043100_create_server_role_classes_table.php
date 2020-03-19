<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\ServerRoleClass;

class CreateServerRoleClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('server_role_classes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });
        $server_role_classes=array(
            ['name'=>'Infrastrcture'],
            ['name'=>'Application'],
            ['name'=>'Security'],
        );
        foreach($server_role_classes as $server_role_class){
            ServerRoleClass::create($server_role_class);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('server_role_classes');
    }
}
