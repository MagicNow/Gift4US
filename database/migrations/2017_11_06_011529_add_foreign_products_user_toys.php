<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignProductsUserToys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produtos', function(Blueprint $table)
        {
            $table->foreign('festas_id', 'produtos_festas_id')->references('id')->on('festas')->onUpdate('SET NULL')->onDelete('SET NULL');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function(Blueprint $table)
        {
            $table->dropForeign('produtos_festas_id');
        });
    }
}
