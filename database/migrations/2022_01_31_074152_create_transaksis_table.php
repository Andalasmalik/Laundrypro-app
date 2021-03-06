<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_transaksi', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->foreignId('outlet_id')->index();
            $table->string('kode_invoice');
            $table->foreignId('member_id');
            $table->date('tgl');
            $table->date('batas_waktu');
            $table->double('biaya_tambahan');
            $table->double('total');
            $table->double('diskon');
            $table->integer('pajak');
            $table->enum('status', [
                'baru', 'proses', 'selesai', 'diambil'
            ]);
            $table->enum('pembayaran', [
                'dibayar', 'belum_dibayar'
            ]);
            $table->foreignId('user_id');
            $table->timestamps();

            // $table->foreign('id_outlet')->references('id')->on('tb_outlet')->onDelete('cascade');
            // $table->foreign('id_member')->references('id')->on('tb_member')->onDelete('cascade');
            // $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}