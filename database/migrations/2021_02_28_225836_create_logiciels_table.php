<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogicielsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logiciels', function (Blueprint $table) {
            $table->id();
            $table->string('log_nom');
            $table->string('log_serie');
            $table->string('log_license');
            $table->string('log_marque');
            $table->string('log_prixachat');
            $table->date('log_dateachat');
            $table->string('log_garantie');
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
        Schema::dropIfExists('logiciels');
    }
}
