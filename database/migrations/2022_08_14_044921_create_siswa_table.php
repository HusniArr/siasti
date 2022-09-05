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
        Schema::create('siswa', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('nis',12)->nullable();
            $table->string('nm_siswa',150);
            $table->date('tgl_lhr')->nullable();
            $table->string('tpt_lhr',100)->nullable();
            $table->enum('jns_kel',['L','P'])->nullable();
            $table->text('alamat')->nullable();
            $table->string('no_telp');
            $table->string('gbr_siswa')->nullable();
            $table->integer('id_user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
};
