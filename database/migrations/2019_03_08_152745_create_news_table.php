<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('heade');
            $table->text('body')->nullable();
            $table->string('image');
            $table->string('link');
            $table->integer('typestudent')->unsigned();
            $table->foreign('typestudent')
                ->references('id')
                ->on('typestudents');
            $table->integer('admincreate')->unsigned();
            $table->foreign('admincreate')
                ->references('id')
                ->on('users');
            $table->integer('adminupdate')->unsigned()->nullable();
            $table->foreign('adminupdate')
                ->references('id')
                ->on('users');
            $table->integer('adminsend')->unsigned()->nullable();
            $table->foreign('adminsend')
                ->references('id')
                ->on('users');
            $table->timestamp('create_add')->nullable();
            $table->timestamp('update_add')->nullable();
            $table->timestamp('send_add')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
