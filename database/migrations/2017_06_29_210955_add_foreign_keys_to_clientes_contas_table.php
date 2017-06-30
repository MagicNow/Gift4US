<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToClientesContasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('clientes_contas', function(Blueprint $table)
		{
			$table->foreign('bancos_id', 'clientes_contas_banco_id')->references('id')->on('bancos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('clientes_id', 'clientes_contas_cliente_id')->references('id')->on('clientes')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('clientes_contas', function(Blueprint $table)
		{
			$table->dropForeign('clientes_contas_banco_id');
			$table->dropForeign('clientes_contas_cliente_id');
		});
	}

}
