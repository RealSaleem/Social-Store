<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->string('product_name' , 150)->nullable();
            $table->string('price' , 150)->nullable();
            $table->text('description')->nullable();
            $table->string('image' , 150)->nullable();
            $table->string('type' , 150)->nullable();
            $table->string('duration' , 150)->nullable();
            $table->softDeletes('deleted_at');
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
        Schema::dropIfExists('ads');
    }
}
