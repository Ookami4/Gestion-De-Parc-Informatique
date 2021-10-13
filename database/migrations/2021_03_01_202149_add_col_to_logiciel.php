<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColToLogiciel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('logiciels', function (Blueprint $table) {
             $table->foreignId('for_id')->constrained('fournisseurs');
             $table->foreignId('fac_id')->constrained('factures');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('logiciel', function (Blueprint $table) {
            //
        });
    }
}
