<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('name');
            $table->string('email');
            $table->string('password')->bcrypt();
            $table->string('remember_token')->bcrypt()->nullable();
            $table->string('reset_token')->bcrypt()->nullable();
            $table->dateTime('email_verified_at')->nullable();
            $table->integer('role_id')->default(1);
            $table->boolean('is_active')->default(1);
            $table->string('security_q')->bcrypt();
            $table->string('security_q')->bcrypt();
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
        Schema::dropIfExists('users');
    }
}
