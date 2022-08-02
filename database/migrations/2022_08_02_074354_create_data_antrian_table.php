<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataAntrianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_antrian', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained('users')->onDelete('restrict');
            $table->foreignId('layanan_id')->constrained('layanan')->onDelete('restrict');
            $table->foreignId('kantor_id')->constrained('kantor')->onDelete('restrict');

            $table->string('kode_booking', 100)->nullable();
            $table->date('tanggal_kedetangan')->nullable();
            $table->string('waktu_kedatangan', 50)->nullable()->comment('PAGI / SIANG');
            $table->string('status', 100)->nullable();

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
        Schema::dropIfExists('data_antrian');
    }
}
