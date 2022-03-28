<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenggunaanBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penggunaan_barangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang', 100);
            $table->double('qty');
            $table->double('harga');
            $table->dateTime('waktu_beli');
            $table->string('supplier', 100);
            $table->enum('status', [
                'diajukan_beli', 'habis', 'tersedia',
            ]);
            $table->dateTime('waktu_update');
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
        Schema::dropIfExists('penggunaan_barangs');
    }
}
