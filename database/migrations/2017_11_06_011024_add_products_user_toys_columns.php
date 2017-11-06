<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProductsUserToysColumns extends Migration
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
            $table->integer('festas_id')->unsigned()->nullable()->index('produtos_festas_id')->after('status');
            $table->tinyInteger('adicionado')->default(0)->after('status');
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
            $table->dropColumn('festas_id');
            $table->dropColumn('adicionado');
        });
    }
}
