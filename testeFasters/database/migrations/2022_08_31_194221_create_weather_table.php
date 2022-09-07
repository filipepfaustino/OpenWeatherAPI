<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration

{

    public function up()
    {
        Schema::create('weathers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('city_name');
            $table->float('temp');
            $table->float('feels_like');
            $table->float('temp_min');
            $table->float('temp_max');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('weathers');
    }
};
