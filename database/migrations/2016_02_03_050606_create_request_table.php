<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videorequests', function(Blueprint $table){
          $table->increments('id');
          $table->string('description');
          $table->string('requester_name');
          $table->string('requester_email');
          $table->string('request_status');
          $table->integer('resolver_id');
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
        Schema::drop('videorequests');
    }
}
