<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFurnituregalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('furnituregalleries', function (Blueprint $table) {
           $table->increments('id');
            $table->string('name');
            $table->longText('description');
            $table->integer('price');
            $table->mediumText('details');
            $table->string('dimentions');
            $table->string('category');
            $table->string('condition');
            $table->string('image');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('furnituregalleries');
    }
}
