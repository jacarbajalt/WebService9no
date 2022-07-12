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
        Schema::create('expedientes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('noExpediente');
            $table->bigInteger('idPaciente')->unsigned();
            $table->bigInteger('idDoctor')->unsigned();
            $table->string('descripcion');
            $table->foreign('idPaciente')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('idDoctor')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('expedientes');
    }
};
