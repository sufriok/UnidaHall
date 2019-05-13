<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('staff_id')->unsigned();
            $table->integer('room_id')->unsigned();
            $table->string('peminjam');
            $table->integer('prodi_id')->unsigned();
            $table->string('no_hp');
            $table->longText('alamat');
            $table->string('acara');
            $table->date('tgl_awal'); 
            $table->date('tgl_akhir');
            $table->integer('time_id')->unsigned();
            $table->string('surat');
            $table->string('color');
            $table->string('status')->default('belum terkonfirmasi');
            $table->string('pember_izin')->default('belum');
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
        Schema::dropIfExists('rentals');
    }
}
