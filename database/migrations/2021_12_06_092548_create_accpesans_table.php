<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccpesansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accpesans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pesanans_id')->nullable();
            $table->unsignedBigInteger('mitras_id')->nullable();
            $table->unsignedBigInteger('lokasims_id')->nullable();
            $table->string('harga');
            $table->string('catatan');
            $table->foreign('pesanans_id')->references('id')->on('pesanans');
            $table->foreign('mitras_id')->references('id')->on('mitras');
            $table->foreign('lokasims_id')->references('id')->on('lokasims');
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
        Schema::dropIfExists('accpesans');
    }
}
