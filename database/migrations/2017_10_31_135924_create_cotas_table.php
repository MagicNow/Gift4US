<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCotasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cotas', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('foto', 100)->nullable();
			$table->string('nome', 100)->nullable();
			$table->string('observacao')->nullable();
			$table->float('valor_total', 10)->nullable()->default(0.00);
			$table->boolean('dividir_cota')->nullable();
			$table->integer('quantidade_cotas')->nullable();
			$table->integer('festas_id')->nullable();
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
		Schema::drop('cotas');
	}

}
