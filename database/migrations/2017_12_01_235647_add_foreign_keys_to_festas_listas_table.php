<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFestasListasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('festas_listas', function(Blueprint $table)
		{
			$table->foreign('festas_id', 'festas_listas_festas_id')->references('id')->on('festas')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('festas_listas', function(Blueprint $table)
		{
			$table->dropForeign('festas_listas_festas_id');
		});
	}

}
