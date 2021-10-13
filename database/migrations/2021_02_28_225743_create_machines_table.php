<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machines', function (Blueprint $table) {
            $table->id();
            $table->string('mach_nom');
            $table->string('mach_marque');
            $table->string('mach_RAM');
            $table->string('mach_ROM');
            $table->string('mach_CPU');
            $table->string('mach_carte_reseau');
            $table->boolean('affecter')->default(false);
            $table->date('date_affect')->nullable();
            $table->string('lieu_affect')->nullable();
            $table->foreignId('util_id')->constrained('users');
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
        Schema::dropIfExists('machines');
    }
}
