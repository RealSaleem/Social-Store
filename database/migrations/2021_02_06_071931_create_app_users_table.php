<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_users', function (Blueprint $table) {
            $table->id();
            $table->string('user_name' , 150)->nullable();
            $table->string('first_name' , 150)->nullable();
            $table->string('last_name' , 150)->nullable();
            $table->string('email' , 150)->nullable();
            $table->string('image' , 255)->nullable();
            $table->string('phone' , 150)->nullable();
            $table->string('password' , 150)->nullable();
            $table->string('category_id' , 150)->nullable();
            $table->string('country_id' , 150)->nullable();
            $table->string('verified_token', 255)->nullable();
            $table->string('email_verified_at', 255)->nullable();
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
        Schema::dropIfExists('app_users');
    }
}
