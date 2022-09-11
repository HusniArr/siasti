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
        Schema::create('instruktur', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('kd_instr',14);
            $table->string('nm_instr',150);
            $table->date('tgl_lhr');
            $table->string('tpt_lhr',100);
            $table->enum('jns_kel',['L','P']);
            $table->text('alamat');
            $table->string('no_telp');
            $table->string('gbr_instr')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instruktur');
    }
};
