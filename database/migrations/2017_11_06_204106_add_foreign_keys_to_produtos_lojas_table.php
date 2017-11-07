<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProdutosLojasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('produtos_lojas', function(Blueprint $table)
		{
			$table->foreign('produtos_id')->references('id')->on('produtos')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('produtos_lojas', function(Blueprint $table)
		{
			$table->dropForeign('produtos_lojas_produtos_id_foreign');
		});
	}

}
