<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * untuk mendeklarasikan dan membuat table user ke database
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('nama', 100);
            $table->string('email', 30)->unique();
            $table->text('password');
            $table->foreignId('outlet_id');
            $table->enum('role', [
                'admin', 'kasir', 'owner'
            ]);
            $table->timestamps();

            // $table->foreign('id_outlet')->references('id')->on('tb_outlet')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     * untuk melakukan rollback agar datanya ikut kembali seperti semula
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
