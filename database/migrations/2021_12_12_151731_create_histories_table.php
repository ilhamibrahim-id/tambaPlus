<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('layanan_id')->nullable();
            $table->unsignedBigInteger('customers_id')->nullable();
            $table->unsignedBigInteger('mitras_id')->nullable();
            $table->string('latitude');
            $table->string('longitude');
            $table->string('harga')->nullable();
            $table->string('catatan')->nullable();
            $table->foreign('layanan_id')->references('id')->on('layanan');
            $table->foreign('customers_id')->references('id')->on('customers');
            $table->foreign('mitras_id')->references('id')->on('mitras');
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
        Schema::dropIfExists('histories');
    }
}
