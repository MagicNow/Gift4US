<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToClientesTempsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('clientes_temps', function(Blueprint $table)
		{
			$table->foreign('clientes_id', 'clientes_temps_clientes_id')->references('id')->on('clientes')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('clientes_temps', function(Blueprint $table)
		{
			$table->dropForeign('clientes_temps_clientes_id');
		});
	}

}
