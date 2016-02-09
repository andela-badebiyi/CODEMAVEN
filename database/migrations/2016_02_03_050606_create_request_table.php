<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videorequests', function (Blueprint $table) {
          $table->increments('id');
          $table->string('description');
          $table->string('requester_name');
          $table->string('requester_email');
          $table->integer('request_status')->default(0);
          $table->integer('resolver_id')->nullable();
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
