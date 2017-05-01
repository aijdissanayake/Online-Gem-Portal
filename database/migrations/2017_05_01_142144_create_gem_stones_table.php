<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGemStonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gem_stones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id');
            $table->string('description');
            $table->integer('gem_type_id');
            $table->integer('gem_size_id');
            $table->string('image_src');
            $table->string('image_name');
            $table->integer('price');
            $table->boolean('sold');
            $table->boolean('active');
            $table->boolean('deleted');
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
        Schema::dropIfExists('gem_stones');
    }
}
