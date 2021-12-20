<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLokasimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lokasims', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mitras_id')->nullable();
            $table->double('latitude');
            $table->double('longitude');
            $table->string('status');
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
        Schema::dropIfExists('lokasims');
    }
}
