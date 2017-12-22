<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('vehicle', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('vehicle_number', 255)->nullable();
            $table->string('vehicle_name', 255)->nullable();
            $table->string('vehicle_color', 50)->nullable();
            $table->integer('fare')->nullable();
            $table->integer('seats')->nullable();
            $table->string('source', 255)->nullable();
            $table->string('destination', 255)->nullable();
            $table->string('phone', 255)->nullable();
            $table->timestamps();

            $table->engine = 'InnoDB';
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vehicle');
	}

}
