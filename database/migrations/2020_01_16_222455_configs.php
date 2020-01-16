<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Configs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sitename');
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->integer('active')->default(1);
            $table->integer('copyright')->default(1);
            $table->integer('author')->default(1);
            $table->string('title')->default(1);
            $table->string('ordercount')->default(10);
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
        Schema::dropIfExists('configs');
    }
}
