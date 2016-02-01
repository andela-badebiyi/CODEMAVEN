<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NewStuff extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function(Blueprint $table){
          $table->increments('id');
          $table->string('author');
          $table->text('body');
          $table->integer('user_id')->unsigned();
          $table->integer('video_id')->unsigned();
          $table->foreign('video_id')->references('id')->on('videos');
          $table->integer('reply_id')->unsigned()->default(0);
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
        Schema::drop('comments');
    }
}
