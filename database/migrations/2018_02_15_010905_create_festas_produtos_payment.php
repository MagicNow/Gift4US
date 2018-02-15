<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFestasProdutosPayment extends Migration
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
            $table->string('cpf', 20)->nullable()->after('rg');
            $table->bigInteger('telefone')->nullable()->after('rg');
            $table->dateTime('nascimento')->nullable()->after('rg');
            $table->integer('final_cartao')->nullable()->after('rg');
            $table->string('cep', 10)->nullable()->after('rg');
            $table->string('endereco', 10)->nullable()->after('rg');
            $table->string('numero', 20)->nullable()->after('rg');
            $table->string('complemento', 100)->nullable()->after('rg');
            $table->string('bairro', 100)->nullable()->after('rg');
            $table->string('cidade', 100)->nullable()->after('rg');
            $table->string('estado', 2)->nullable()->after('rg');
            $table->integer('numero_pedido')->nullable()->unique()->after('rg');
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
            $table->dropColumn('cpf');
            $table->dropColumn('telefone');
            $table->dropColumn('nascimento');
            $table->dropColumn('final_cartao');
            $table->dropColumn('endereco');
            $table->dropColumn('numero');
            $table->dropColumn('complemento');
            $table->dropColumn('bairro');
            $table->dropColumn('cidade');
            $table->dropColumn('estado');
            $table->dropColumn('numero_pedido');
        });
    }
}
