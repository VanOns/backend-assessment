<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('cheese_artisans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('rating');
            $table->integer('production_capacity');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cheese_artisans');
    }
};
