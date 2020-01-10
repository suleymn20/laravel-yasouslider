<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sliders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('author')->nullable();
            $table->string('email')->nullable();
            $table->string('image');
            $table->string('titleslug');
            $table->string('authorslug');
            $table->integer('status')->default(0);
            $table->integer('adminstatu')->default(3);
            $table->integer('order');
            $table->ipAddress('ipadres')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('sliders');
    }
}
