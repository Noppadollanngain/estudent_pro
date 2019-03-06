<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student')->unsigned()->unique();
            $table->foreign('student')
                ->references('id')
                ->on('students');
            $table->integer('typestudent')->unsigned();
            $table->foreign('typestudent')
                ->references('id')
                ->on('typestudents');
            $table->string('estdId')->nullable();
            $table->boolean('doc1')->default(0);
            $table->boolean('doc2')->default(0);
            $table->boolean('doc3')->default(0);
            $table->boolean('confrim')->default(0);
            $table->timestamp('added_doc1')->nullable();
            $table->timestamp('added_doc2')->nullable();
            $table->timestamp('added_doc3')->nullable();
            $table->timestamp('added_confrim')->nullable();
            $table->integer('whoIsget1')->unsigned()->nullable();
            $table->foreign('whoIsget1')
                ->references('id')
                ->on('users');
            $table->integer('whoIsget2')->unsigned()->nullable();
            $table->foreign('whoIsget2')
                ->references('id')
                ->on('users');
            $table->integer('whoIsget3')->unsigned()->nullable();
            $table->foreign('whoIsget3')
                ->references('id')
                ->on('users');
            $table->integer('whoIsconfrim')->unsigned()->nullable();
            $table->foreign('whoIsconfrim')
                ->references('id')
                ->on('users');
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
        Schema::dropIfExists('documents');
    }
}
