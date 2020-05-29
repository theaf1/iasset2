<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Multiuser;

class CreateMultiusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multiusers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        $Multiusers = array (
            ['name'=>'ใช้งานคนเดียว'],
            ['name'=>'ใช้งานหลายคน'],
        );
        foreach ($Multiusers as $Multiuser) {
            Multiuser::create($multiuser);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('multiusers');
    }
}
