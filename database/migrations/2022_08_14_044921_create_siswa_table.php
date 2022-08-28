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
            $table->string('nis',10)->primary();
            $table->string('nm_siswa',100);
            $table->date('tgl_lhr');
            $table->string('tpt_lhr',100);
            $table->enum('jns_kel',['L','P']);
            $table->text('alamat');
            $table->string('no_telp');
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