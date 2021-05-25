<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{

    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->index();
            $table->unsignedBigInteger('sub_category_id')->index();
            $table->string('image_thumb')->unique();
            $table->string('image_1')->unique();
            $table->string('image_2')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')
                ->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')
                ->onUpdate('cascade')->onDelete('restrict');
        });
    }


    public function down()
    {
        Schema::dropIfExists('images');
    }
}
