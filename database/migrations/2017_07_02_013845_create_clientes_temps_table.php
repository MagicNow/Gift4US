<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientesTempsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clientes_temps', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('clientes_id')->unsigned()->nullable()->index('clientes_temps_clientes_id');
			$table->string('email')->nullable();
			$table->string('token', 150)->nullable()->default('');
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
		Schema::drop('clientes_temps');
	}

}
