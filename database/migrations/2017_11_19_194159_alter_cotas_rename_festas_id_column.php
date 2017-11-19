<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCotasRenameFestasIdColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cotas', function(Blueprint $table)
        {
            $table->renameColumn('festas_id', 'festa_id');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cotas', function(Blueprint $table)
        {
            $table->renameColumn('festa_id', 'festas_id');
        });
    }
}
