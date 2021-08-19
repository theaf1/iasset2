<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Formfactor;

class CreateFormfactorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formfactors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        $FormFactors = array(
            ['name'=>'Tower'],
            ['name'=>'Rack Mounted'],
        );
        foreach($FormFactors as $FormFactor)
        {
            Formfactor::create($FormFactor);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formfactors');
    }
}
