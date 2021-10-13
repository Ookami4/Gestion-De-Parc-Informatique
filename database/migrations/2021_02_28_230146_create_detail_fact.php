<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailFact extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_factures', function (Blueprint $table) {
            $table->foreignId('fact_id')->constrained('factures');
            $table->foreignId('mat_id')->nullable()->constrained('materiels');
            $table->foreignId('log_id')->nullable()->constrained('logiciels');
            $table->integer('quantite');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_facture');
    }
}
