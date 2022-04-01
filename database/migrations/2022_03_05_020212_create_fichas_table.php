<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fichas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('estado');
            $table->integer('total_apre');
            $table->integer('total_act');
            $table->string('nivel');
            $table->string('fecha_in');
            $table->string('fecha_fin');
            $table->unsignedBigInteger('id_coor');
            $table->foreign('id_coor')->references('id')->on('coordinacions')->onUpdate('cascade')
            ->onDelete('cascade');
            
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
        Schema::dropIfExists('fichas');
    }
};
