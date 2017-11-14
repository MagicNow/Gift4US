<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterFestasAddCodeColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('festas', function(Blueprint $table)
        {
            $table->string('codigo', 10)->nullable()->after('step');
            $table->string('slug', 100)->nullable()->after('step');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('festas', function(Blueprint $table)
        {
            $table->dropColumn('codigo');
            $table->dropColumn('slug');
        });
    }
}
