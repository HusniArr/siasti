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
        Schema::create('kursus', function (Blueprint $table) {
            $table->string('kd_kursus',14)->primary();
            $table->string('nm_kursus',200);
            $table->string('jenjang',50);
            $table->string('jdwl_kursus',50);
            $table->time('wkt_kursus');
            $table->integer('biaya_kursus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kursus');
    }
};
