<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFestasListasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('festas_listas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('festas_id')->unsigned()->index('festas_id');
			$table->string('email')->nullable();
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
		Schema::drop('festas_listas');
	}

}
