<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddfriendTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addfriend', function (Blueprint $table) {
	        $table->increments('id');
	        $table->integer('userid');
	        $table->string('username');
	        $table->string('useravatar');
	        $table->string('requesterid');
	        $table->string('requestername');
	        $table->string('requesteravatar');
	        $table->string('type');
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
        Schema::dropIfExists('addfriend');
    }
}
