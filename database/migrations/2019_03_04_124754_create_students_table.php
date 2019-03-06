<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('stdId')->unique();
            $table->string('peopleId')->unique();
            $table->integer('whoIsupdate')->unsigned()->nullable();
            $table->foreign('whoIsupdate')
                ->references('id')
                ->on('users');
            $table->boolean('loginstatus')->default(0);
            $table->string('notification_token')->unique()->nullable();
            $table->text('major');
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
        Schema::dropIfExists('students');
    }
}
