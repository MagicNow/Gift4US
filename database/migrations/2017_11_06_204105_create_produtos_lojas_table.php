<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProdutosLojasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('produtos_lojas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('produtos_id')->unsigned()->nullable()->index('produtos_id');
			$table->string('nome', 100)->nullable();
			$table->string('link')->nullable();
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
		Schema::drop('produtos_lojas');
	}

}
