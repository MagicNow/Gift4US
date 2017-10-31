<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConfirmacaoPresencasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('confirmacao_presencas', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nome', 100)->nullable();
			$table->string('email')->nullable();
			$table->integer('numero_pessoas')->nullable()->index('numero_pessoas');
			$table->integer('festas_id')->unsigned()->nullable()->index('confirmacao_presenca_festas_id');
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
		Schema::drop('confirmacao_presencas');
	}

}
