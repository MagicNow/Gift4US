<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProductsBuyedColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('festas_produtos', function(Blueprint $table)
        {
            $table->string('nome', 100)->nullable();
            $table->string('email', 255)->nullable();
            $table->bigInteger('rg')->nullable();
            $table->text('mensagem')->nullable();
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
        Schema::table('festas_produtos', function(Blueprint $table)
        {
            $table->dropColumn('nome');
            $table->dropColumn('email');
            $table->dropColumn('rg');
            $table->dropColumn('mensagem');
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
    }
}
