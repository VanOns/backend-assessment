<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('dairy_farms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('number_of_cows');
            $table->float('milk_quality');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dairy_farms');
    }
};
