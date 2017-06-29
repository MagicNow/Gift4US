<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientesContasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clientes_contas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('clientes_id')->unsigned()->nullable()->index('clientes_contas_cliente_id');
			$table->string('bancos_id', 5)->nullable()->index('clientes_contas_banco_id');
			$table->enum('tipo_conta', array('CORRENTE','POUPANCA'))->nullable();
			$table->string('agencia', 8)->nullable();
			$table->string('conta', 14)->nullable();
			$table->integer('cpf')->nullable();
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
		Schema::drop('clientes_contas');
	}

}
