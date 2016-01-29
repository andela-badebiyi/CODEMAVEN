<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColsToUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table){
            $table->string('occupation')->nullable();
            $table->string('location')->nullable();
            $table->string('favstack')->nullable();
            $table->date('dob')->nullable();
            $table->text('bio')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table){
            $table->dropColumn('occupation');
            $table->dropColumn('location');
            $table->dropColumn('favstack');
            $table->dropColumn('bio');
            $table->dropColumn('dob');
        });
    }
}
