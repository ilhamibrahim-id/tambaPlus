<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobSelesaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobselesai', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('listjob_id')->nullable();
            $table->unsignedBigInteger('karyawan_id')->nullable();
            $table->string('bukti');
            $table->string('status');
            $table->timestamps();
        });

        Schema::table('jobselesai', function($table) {
            $table->foreign('listjob_id')->references('id')->on('listjob');
            $table->foreign('karyawan_id')->references('id')->on('karyawan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobselesai');
    }
}
