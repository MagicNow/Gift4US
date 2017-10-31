<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToConfirmacaoPresencasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('confirmacao_presencas', function(Blueprint $table)
		{
			$table->foreign('festas_id', 'confirmacao_presenca_festas_id')->references('id')->on('festas')->onUpdate('SET NULL')->onDelete('SET NULL');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('confirmacao_presencas', function(Blueprint $table)
		{
			$table->dropForeign('confirmacao_presenca_festas_id');
		});
	}

}
